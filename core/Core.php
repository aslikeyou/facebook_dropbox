<?php

require_once 'fb_api/facebook.php';

class Core
{
	/**
	 * @var PDO
	 */
	private static $db;

	/**
	 * @var Facebook
	 */
	private static $fb;

	/**
	 * @var array
	 */
	private static $config;

	function __construct($config = array())
	{
		self::setDb($config['db']);
		self::setFb($config['fb']);

		self::$config = $config;
	}

	/**
	 * @param string $key
	 *
	 * @return array
	 */
	public static function getConfig($key = '')
	{
		if(!empty($key) && isset(self::$config[$key]))
			return self::$config[$key];

		return self::$config;
	}

	public static function getAppId() {
		if(!empty(self::$config) && isset(self::$config['fb']['appId']))
			return self::$config['fb']['appId'];
		return false;
	}

	/**
	 * @param $config array
	 */
	public static function init($config) {
		self::setConfig($config);
	}

	/**
	 * @param $config array
	 */
	private static function setConfig($config)
	{
		self::$config = $config;
	}

	/**
	 * @return Core
	 */
	public static function app() {
		return new self(self::$config);
	}

	/**
	 * @return PDO
	 */
	public static function getDb()
	{
		return self::$db;
	}


	/**
	 * @param $db array
	 */
	public static function setDb($db)
	{
		self::$db = new PDO($db['connectString'], $db['user'], $db['pass']);
	}

	/**
	 * @return Facebook
	 */
	public static function getFb()
	{
		return self::$fb;
	}

	/**
	 * @param $fb array
	 */
	public static function setFb($fb)
	{
		self::$fb = new Facebook($fb);
	}

}