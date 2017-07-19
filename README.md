# hermes-client-bundle

## Installation
```bash
composer require classifieds-maciej/hermes-client-bundle
```

## Configuration
For guzzle entry all [guzzle client options](http://docs.guzzlephp.org/en/stable/request-options.html) can be set. Otherwise Guzzle default values are provided.
Retries and retry_sleep are used only for synchronous requests. Otherwise they are ignored.
```yaml
# app/config/config.yml
hermes_client:
    guzzle:
        timeout: 1.0
        connect_timeout: 1.0
        (...)
    base_url: http://localhost:8080/topics/
    retries: 3
    retry_sleep: 100
```