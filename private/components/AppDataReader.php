<?php

class AppDataReader
{
	private static $table = 'app_data';


	/**
	 * @param $fieldName
	 *
	 * @return bool|string
	 */
	public static function getField($fieldName)
	{
		$table = self::$table;
		$statement = Core::app()->getDb()->prepare("SELECT value FROM {$table} WHERE field = :field");
		if(!$statement->execute(array(':field' => $fieldName)))
			return false;

		return $statement->fetchColumn();
	}

	/**
	 * @param $token
	 *
	 * @return bool
	 */
	public static function setField($token)
	{
		$table = self::$table;
		$statement = Core::app()->getDb()->prepare("UPDATE {$table} SET value = :value WHERE field = access_token");
		return $statement->execute(array(':value' => $token));
	}

}