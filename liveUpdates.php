<?php

require_once './core/FB.php';

$app = new Core();

$verify_token = '123';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['hub_mode'])
	&& $_GET['hub_mode'] == 'subscribe' && isset($_GET['hub_verify_token'])
	&& $_GET['hub_verify_token'] == $verify_token) {
	echo $_GET['hub_challenge'];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$post_body = file_get_contents('php://input');
	//$obj = json_decode($post_body, true);
	$app->getDb()->prepare("INSERT INTO test (json) VALUES ('$post_body')")->execute();
}

$app->getDb()->prepare("INSERT INTO test (json) VALUES ('refresh page')")->execute();


