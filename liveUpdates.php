<?php

require_once './core/Core.php';

$app = new Core();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['hub_mode'])
	&& $_GET['hub_mode'] == 'subscribe' && isset($_GET['hub_verify_token'])
	&& $_GET['hub_verify_token'] == AppDataReader::getField('verify_token')) {
	echo $_GET['hub_challenge'];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$post_body = file_get_contents('php://input');
	//$obj = json_decode($post_body, true);
	$app->getDb()->prepare("INSERT INTO test (json) VALUES (':data')")
		->execute(array(':data' => $post_body));
}

$app->getDb()->prepare("INSERT INTO test (json) VALUES ('refresh page')")->execute();


