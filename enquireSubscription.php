<?php

require_once './init.php';

$param = array('access_token' => AppDataReader::getField('access_token'));
$subs = Core::app()->getFb()->api('/'.Core::getAppId().'/subscriptions', $param);

print_r($subs);