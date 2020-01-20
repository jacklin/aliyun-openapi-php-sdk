<?php 
namespace Tool; 
define('ALIYUN_OPENAPI_PHP_SDK',__DIR__.'/aliyun-openapi-php-sdk/');
include_once ALIYUN_OPENAPI_PHP_SDK.'aliyun-php-sdk-core/Config.php';

/**
 * 阿里云SDK通类的实例类
 */
class AliyunSdk
{
	private $accessKeyId;
	private $accessKeySecret;
	private $appKey;

	/**
	 * 构造方法
	 * BaZhang Platform
	 * @Author   Jacklin@shouyiren.net
	 * @DateTime 2020-01-20T16:55:04+0800
	 * @param    string                   $accessKeyId     访问ID
	 * @param    string                   $accessKeySecret 访问密钥
	 * @param    string                   $appKey          应用私钥
	 */
	public function __construct($accessKeyId, $accessKeySecret, $appKey=''){
			// 设置你自己的AccessKeyId/AccessSecret/AppKey
			$this->accessKeyId = $accessKeyId;
			$this->accessKeySecret = $accessKeySecret;
			$this->appKey = $appKey;
	}
	
	/**
	 * 魔术回调方法
	 * BaZhang Platform
	 * @Author   Jacklin@shouyiren.net
	 * @DateTime 2020-01-20T16:56:15+0800
	 * @param    string                   $name      实例SDK请求项
	 * @param    array                    $arguments 参数：V20180509 ImageSyncScanRequest
	 *                                               版本 实例相应请求类
	 * @return   mixed                              实例相应请求类
	 */
	public function __call(string $name, $arguments=[]){
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