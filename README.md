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
//$timeout默认60s可不传，单位为秒
$client = new HandClient($ak, $sk,$timeout);

//提供2种方式上传（1.Base64，2.图片url）

//1.使用图片的$base64编码进行调用,如果使用表单或者其他方式上传图片的，需要获取图片的base64
$bas64 = "data:image\jpg;base64......"；
$res = $client->handRecognitionByBase64($bas64);

//2.使用图片地址上传
$url = "https://....";
$res = $client->handRecognitionByUrl($url);

```