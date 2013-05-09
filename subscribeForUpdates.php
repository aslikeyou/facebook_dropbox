<?php

require_once './init.php';

$param = array('access_token' => AppDataReader::getField('access_token'),
               'object' => 'user',
               'fields' => 'name,feed,email',
               'callback_url' => Core::getConfig('host').'/liveUpdates.php',
               'verify_token' => AppDataReader::getField('verify_token')
);
$fbConf = Core::getConfig('fb');
$appId = $fbConf['appId'];
$subs = Core::app()->getFb()->api('/'.$appId.'/subscriptions', 'POST', $param);

print_r($subs);
