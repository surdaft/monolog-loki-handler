<?php


namespace Er1z\MonologLokiHandler;


use Monolog\Formatter\NormalizerFormatter;

class LokiFormatter extends NormalizerFormatter
{
    private function getLabels(array $record): array
    {
        $extra = $record['extra'];
        unset($record['datetime'], $record['context'], $record['message'], $record['extra']);
        $result = $record + $extra;

        $result = array_map('strval', $result);

        return $result;
    }

    private function getFieldsForMessage(array $context): string
    {
        $result = [];
        foreach($context as $k=>$v){
            $value = (!is_array($v) && !is_object($v)) ? $v : $this->toJson($v);
            $result[] = sprintf('%s="%s"', $k, addslashes($value));
        }

        return implode(' ', $result);
    }

    private function getRecordEntry(array $record): array
    {
        $formatted = $record;

        $message = sprintf('%s %s', $formatted['message'], $this->getFieldsForMessage($formatted['context']));

        return [
            'stream'=>$this->getLabels($formatted),
            'values'=>[
                [
                    strtotime($formatted['datetime']).'000000000', $message
                ]
            ]
        ];
    }

    public function format(array $record)
    {
        $data = parent::format($record);
        return $this->getRecordEntry($data);
    }


}
