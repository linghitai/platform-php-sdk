# logs for php

## how to use

> composer require data-center/log-sdk


单条日志

```php

require __DIR__ . '/vendor/autoload.php';

use DataCenter\LogSdk\LogService;
use DataCenter\LogSdk\Request\Track;

$instance = new Track();

$service = new LogService('F00', true);

$service->setUserId('abcd-212');

$response = $service->post($instance);

var_dump($response->isSuccessful());
var_dump($response->toArray());

```

多条日志

```php

require __DIR__ . '/vendor/autoload.php';

use DataCenter\LogSdk\LogService;
use DataCenter\LogSdk\Request\Track;

$instance = new Track();

$service = new LogService('F00', true);

$service->setUserId('abcd-212');

$service->setBody($instance);
$service->setBody($instance);
$service->setBody($instance);

$response = $service->post();

var_dump($response->isSuccessful());
var_dump($response->toArray());

```

添加附加参数

```php

require __DIR__ . '/vendor/autoload.php';

use DataCenter\LogSdk\LogService;
use DataCenter\LogSdk\Request\Track;

$instance = new Track();

$instance->setIp('127.0.0.1');

$instance->setAttr('ip', '127.0.0.01');

``

添加公共参数

```php

require __DIR__ . '/vendor/autoload.php';

use DataCenter\LogSdk\LogService;
use DataCenter\LogSdk\Request\Track;

$instance = new Track();

$instance->setExtends('ip', '127.0.0.01');

// or

$service = new LogService('F00', true);

$service->setExtends('tag_id','abcd-212');

```# platform-php-sdk
