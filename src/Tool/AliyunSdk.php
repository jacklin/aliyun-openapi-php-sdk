<?php 
namespace Tool; 
define('ALIYUN_OPENAPI_PHP_SDK',__DIR__.'/aliyun-openapi-php-sdk/');
include_once ALIYUN_OPENAPI_PHP_SDK.'aliyun-php-sdk-core/Config.php';
use Push\Request\V20160801;
/**
* 
*/
class AliyunSdk
{
	public $product; //应用sdk的某个项目
	private $accessKeyId;
	private $accessKeySecret;
	private $appKey;
	public function __construct($accessKeyId, $accessKeySecret, $appKey){
			// 设置你自己的AccessKeyId/AccessSecret/AppKey
			$this->accessKeyId = $accessKeyId;
			$this->accessKeySecret = $accessKeySecret;
			$this->appKey = $appKey;
	}
	
	public function __call(string $name, $arguments=[]){
		$iClientProfile = \DefaultProfile::getProfile("cn-hangzhou", $this->accessKeyId, $this->accessKeySecret);
		$client = new \DefaultAcsClient($iClientProfile);

		$mid_suffix = array_shift($arguments);
		$suffix = array_shift($arguments);
		$class_name = ucfirst($name).'\\Request\\'.$mid_suffix.'\\'.$suffix;

		if (class_exists($class_name)) {
			$request = new $class_name();
			if (method_exists($request, 'setAppKey')) {
				$request->setAppKey($this->appKey);
			}
			return $request;
		}else{
			throw new \Exception("调用的方法无法实例化类:".$class_name);
		}
	}
}