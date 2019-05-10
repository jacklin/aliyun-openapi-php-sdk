<?php
require_once("../src/Tool/AliyunSdk.php");
require_once("../vendor/autoload.php");

// use Tool\AliyunSdk;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

// Set up a global client
AlibabaCloud::accessKeyClient("aaa", "bbb")
            ->regionId("cn-hangzhou")
            ->asDefaultClient();

// $aliyun_sdk = new AliyunSdk("1","2","2");

echo "<pre>";

// var_dump($aliyun_sdk->Push('V20160801','PushRequest'));
// var_dump($aliyun_sdk->Cs('V20151215','CreateTemplateRequest'));
try {
    // Access product APIs
    $request = AlibabaCloud::ecs()->v20140526()->describeRegions();
    
    // Set options/parameters and execute request
    $result = $request->withResourceType('type') // API parameter
                      ->withInstanceChargeType('type') // API parameter
                      ->client('client1') // Specify the client for send
                      ->debug(true) // Enable the debug will output detailed information
                      ->connectTimeout(0.01) // Throw an exception when Connection timeout 
                      ->timeout(0.01) // Throw an exception when timeout 
                      ->request(); // Execution request

    // Can also Set by passing in an array
    $options = [
                   'debug'           => true,
                   'connect_timeout' => 0.01,
                   'timeout'         => 0.01,
                   'query'           => [
                       'ResourceType' => 'type',
                       'InstanceChargeType' => 'type',
                   ],
               ];
    
    // Settings priority
    $result2 = AlibabaCloud::ecs()
                           ->v20140526()
                           ->describeRegions($options)
                           ->options([
                                         'query' => [
                                             'Key'      => 'I will overwrite this value in constructor',
                                             'new'      => 'I am new value',
                                         ],
                                     ])
                           ->options([
                                         'query' => [
                                             'Key' => 'I will overwrite the previous value',
                                             'bar' => 'I am new value',
                                         ],
                                     ])
                           ->debug(false) // Overwrite the true of the former
                           ->request();
    
} catch (ClientException $exception) {
    echo $exception->getMessage(). PHP_EOL;
} catch (ServerException $exception) {
    echo $exception->getMessage() . PHP_EOL;
    echo $exception->getErrorCode(). PHP_EOL;
    echo $exception->getRequestId(). PHP_EOL;
    echo $exception->getErrorMessage(). PHP_EOL;
}