<?php

require_once './init.php';
$app = Core::app();
$fbConfig = $app->getConfig('fb');
$args = array('grant_type'    => 'client_credentials',
              'client_id'     => $fbConfig['appId'],
              'client_secret' => $fbConfig['secret']);

$ch = curl_init();
$url = 'https://graph.facebook.com/oauth/access_token';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
// a string like "access_token=135918543108078|FUB4B5O2oVoxs1FUBMpHL1dpY5Q"
$returnValue = curl_exec($ch);
curl_close($ch);

$accessToken = substr($returnValue,strpos($returnValue,'=')+1);

$db = $app->getDb();

$db->prepare(
	"INSERT INTO app_data VALUES (null, access_token, :access_token)"
)->execute(array(':access_token' => $accessToken));
