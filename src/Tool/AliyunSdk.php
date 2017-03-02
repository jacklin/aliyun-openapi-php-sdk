<?php 
namespace Tool; 
define('ALIYUN_OPENAPI_PHP_SDK',__DIR__.'/aliyun-openapi-php-sdk/');
include_once ALIYUN_OPENAPI_PHP_SDK.'aliyun-php-sdk-core/Config.php';

use Alidns\Request\V20150109;
use BatchCompute\Request\V20130111;
use Cdn\Request\V20141111;
use CS\Request\V20151215;
use Dm\Request\V20151123;
use Domain\Request\V20160511;
use Ecs\Request\V20140526;
use Green\Request\V20161216;
use Iot\Request\V20160530;
use jap\Request\V20161123;
use Kms\Request\V20160120;
use live\Request\V20161101;
use Mts\Request\V20140618;
use Push\Request\V20160801;
use Rds\Request\V20140815;
use Slb\Request\V20140515;
use Sms\Request\V20160827;
use Sts\Request\V20150401;
use Ubsms\Request\V20150623;
/**
* 
*/
class AliyunSdk
{
	private $accessKeyId;
	private $accessKeySecret;
	private $appKey;
	private $client; //对就SDK客户端对象
	public function __construct($accessKeyId, $accessKeySecret, $appKey){
			// 设置你自己的AccessKeyId/AccessSecret/AppKey
			$this->accessKeyId = $accessKeyId;
			$this->accessKeySecret = $accessKeySecret;
			$this->appKey = $appKey;
	}
	
	public function __call(string $name, $arguments=[]){
		$iClientProfile = \DefaultProfile::getProfile("cn-hangzhou", $this->accessKeyId, $this->accessKeySecret);
		$this->setClient(new \DefaultAcsClient($iClientProfile));

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
	public function getClient(){
		return $this->client;
	}
	protected function setClient(\DefaultAcsClient $client){
		$this->client = $client;
		return $this;
	}
}