# hermes-client-bundle

## Installation
```bash
composer require classifieds-maciej/hermes-client-bundle
```

## Configuration
```yaml
# app/config/config.yml
hermes_client:
    base_url: http://localhost:8080/topics/
    retries: 3
    retry_sleep: 100
```