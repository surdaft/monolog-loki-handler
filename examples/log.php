<?php
require 'vendor/autoload.php';

$logger = new Monolog\Logger('my');
$handler = new Er1z\MonologLokiHandler\LokiHandler('http://127.0.0.1:3100');
$logger->pushHandler($handler);

$logger->error('Error!', ['context'=>'value']);
