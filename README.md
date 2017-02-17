# Open API Aliyun Sdk for php developers

## Requirements

- PHP 5.6+|7.0+

## Build

- to run unit tests, you will have to configure aliyun-sdk.properties files in your user directory, and make sure your project has corresponding service enabled, eg. openmr.

## Example

```php
use Tool\AliyunSdk;

$aliyun_sdk = new AliyunSdk('accessKeyId','accessKeySecret,'appKey');

$request_push = $aliyun_sdk->push('V20160801','PushRequest');


// 推送配置: iOS
$request_push->setiOSBadge("5"); // iOS应用图标右上角角标
$request_push->setiOSMusic("default"); // iOS通知声音
$request_push->setiOSApnsEnv("DEV");//iOS的通知是通过APNs中心来发送的，需要填写对应的环境信息。"DEV" : 表示开发环境 "PRODUCT" : 表示生产环境
$request_push->setiOSRemind("false"); // 推送时设备不在线（既与移动推送的服务端的长连接通道不通），则这条推送会做为通知，通过苹果的APNs通道送达一次(发送通知时,Summary为通知的内容,Message不起作用)。注意：离线消息转通知仅适用于生产环境
$request_push->setiOSRemindBody("iOSRemindBody");//iOS消息转通知时使用的iOS通知内容，仅当iOSApnsEnv=PRODUCT && iOSRemind为true时有效
$request_push->setiOSExtParameters("{\"k1\":\"ios\",\"k2\":\"v2\"}"); //自定义的kv结构,开发者扩展用 针对iOS设备
// 推送配置: Android
$request_push->setAndroidNotifyType("NONE");//通知的提醒方式 "VIBRATE" : 震动 "SOUND" : 声音 "BOTH" : 声音和震动 NONE : 静音
$request_push->setAndroidNotificationBarType(1);//通知栏自定义样式0-100
$request_push->setAndroidOpenType("URL");//点击通知后动作 "APPLICATION" : 打开应用 "ACTIVITY" : 打开AndroidActivity "URL" : 打开URL "NONE" : 无跳转
$request_push->setAndroidOpenUrl("http://www.aliyun.com");//Android收到推送后打开对应的url,仅当AndroidOpenType="URL"有效
$request_push->setAndroidActivity("com.alibaba.push2.demo.XiaoMiPushActivity");//设定通知打开的activity，仅当AndroidOpenType="Activity"有效
$request_push->setAndroidMusic("default");//Android通知音乐
$request_push->setAndroidXiaoMiActivity("com.ali.demo.MiActivity");//设置该参数后启动小米托管弹窗功能, 此处指定通知点击后跳转的Activity（托管弹窗的前提条件：1. 集成小米辅助通道；2. StoreOffline参数设为true
$request_push->setAndroidXiaoMiNotifyTitle("Mi Title");
$request_push->setAndroidXiaoMiNotifyBody("Mi Body");
$request_push->setAndroidExtParameters("{\"k1\":\"android\",\"k2\":\"v2\"}"); // 设定android类型设备通知的扩展属性
// 推送控制
$pushTime = gmdate('Y-m-d\TH:i:s\Z', strtotime('+3 second'));//延迟3秒发送
$request_push->setPushTime($pushTime);
$expireTime = gmdate('Y-m-d\TH:i:s\Z', strtotime('+1 day'));//设置失效时间为1天
$request_push->setExpireTime($expireTime);
$request_push->setStoreOffline("false"); // 离线消息是否保存,若保存, 在推送时候，用户即使不在线，下一次上线则会收到
$request_push->setBatchNumber("100010"); // 批次编号,用于活动效果统计. 设置成业务可以记录的字符串
$response = $client->getAcsResponse($request_push);
print_r("\r\n");
print_r($response);

```
## explain

AliyunSdk 的使用类

实例化构造函数需要三个参数分别是 accessKeyId(访问ID), accessKeySecret(访问密钥), appKey(应用公钥)

实例化AliyunSdk类后再调用 阿里云openApi Sdk 中的服务

如：支持方法 alidns|batchcompute|cdn|cs|dm|domain|ecs|green|iot|jaq|kms|live|market|mts|push|rds|slb|sms|sts|ubsms

方法参数分别是 阿里云openApi Sdk 中的目录名即：V20160801 与对应的请求类名称即：PushRequest

注：方法参数值区分大小写

返回值：为请求类对象，使用方法如上【Example】(## Example)

## Authors && Contributors

- [Jack Lin](https://github.com/jacklin)

## License

licensed under the [Apache License 2.0](https://www.apache.org/licenses/LICENSE-2.0.html)
