# monolog-loki-handler
Monolog handler to publish events directly to Loki.

## examples
See `examples` directory.

## how messages are formatted
- Context variables are parsed to logfmt, eg. logging `message` with `['var'=>'val']` will produce `message var=val`, any non-scalar values are JSON-encoded,
- Labels for Loki are defined by `extra` fields.

## default labels:
- `channel`
- `level`
- `level_name`
