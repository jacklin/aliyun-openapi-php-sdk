<?php
require_once("../src/Tool/AliyunSdk.php");

use Tool\AliyunSdk;

$aliyun_sdk = new AliyunSdk(1,2,2);

var_dump($aliyun_sdk->Push('V20160801','PushRequest'));
