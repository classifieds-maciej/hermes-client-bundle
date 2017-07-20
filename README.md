# hermes-client-bundle

## Installation
```bash
composer require classifieds-maciej/hermes-client-bundle
```
Add to AppKernel
```php
new BusBundle\BusBundle(),
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
        http_errors: false
        (...)
    base_url: http://localhost:8080/topics/
    retries: 3
    retry_sleep: 100
```

## Usage
```php
// Async publish
$hermesClient = $this->get('hermes_client');
$hermesClient->publishAsync(
    new HermesMessage('test.group.test_topic', [], 'test body'),
    function (HermesResponse $response) {
        echo "OK";
    },
    function (HermesException $e, HermesMessage $message) {
        echo $e->getMessage();
    }
);
```

```php
// Sync publish
$hermesClient = $this->get('hermes_client');
$response = $hermesClient->publish(new HermesMessage('test.group.test_topic', [], 'test body'));
```
