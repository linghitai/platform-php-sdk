## how to use
## 安装

* 通过composer，这是推荐的方式，可以使用composer.json 声明依赖，或者运行下面的命令
```bash
$ composer require linghitai/platform-php-sdk
```

## 使用方法

### 举例手相服务的HandClient类
```php
require_once __DIR__ . '/vendor/autoload.php';

use LinghitAi\PlatformPhpSdk\HandClient;

//$ak,$sk 在AI平台控制台进行申请
$client = new HandClient($ak, $sk);

//使用图片的$bas64编码进行调用
$bas64 = "data:image\jpg;base64......"；

$res = $client->handRecognitionByBase64($bas64);

```