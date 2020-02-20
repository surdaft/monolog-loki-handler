**Note:**
I want to make this work for Symfony 2.4.18 using an older version of monolog. This means moving from a php7.2 dependency as well as using a monolog 1.25.

---

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
