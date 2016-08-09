<?php

/*
 * работа с БД oracle
 */

class DB {

	private static $orcl = null;
	public static $host = 'ora2.kvint.md';
	public static $user = 'tasting';
	public static $password = '1111';
	public static $instance = 'UNIACC';

	public static function open($persistent = true) {
		self::$orcl = $persistent ? oci_pconnect(self::$user, self::$password, self::$host . '/' . self::$instance) :
				oci_new_connect(self::$user, self::$password, self::$host . '/' . self::$instance);
		if (self::$orcl === false) {
			echo 'Connect to oracle fail!';
			exit();
		}
	}

	public static function query($query) {
		$stid = oci_parse(self::$orcl, $query);
		$res = oci_execute($stid);
		if ($res === false) {
			self::open(false);
			$stid = oci_parse(self::$orcl, $query);
			$res = oci_execute($stid);
		}

		return (bool) $res ? $stid : null;
	}

	/**
	 * получить следующий объект из выборки
	 * @param resource $result
	 * @return object
	 */
	public static function fetch_obj($result) {
		return $result !== null ? oci_fetch_object($result) : null;
	}

	public static function fetch_array($result) {
		return $result !== null ? oci_fetch_array($result) : null;
	}

	/**
	 * количество рядов которое нам вернул запрос
	 * @param resource $result
	 * @return int
	 */
	public static function row_count($result) {
		$results = array();
		return $result !== null ? oci_fetch_all($result, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW) : 0;
	}

	/**
	 * выбираем все (количество рядов + сами ряды)
	 * @param resource $result
	 * @return int
	 */
	public static function fetch_all_objs($stid, &$result) {
		return $stid !== null ? oci_fetch_all($stid, $result, null, null, OCI_FETCHSTATEMENT_BY_ROW) : 0;
	}

	/**
	 * эскейпим строку для работы с БД
	 * @param string $str
	 */
	public static function escape_string($str) {
		return $str;
	}

	/**
	 * количество заапдэйченных строк
	 * @param resource $result
	 * @return int
	 */
	public static function affected_rows($result) {
		return $result !== null ? oci_num_rows($result) : 0;
	}

	/**
	 * эскейпим строку для работы с БД
	 * @param string $str
	 */
	public static function str_conv($str, $print = false) {
		if ($print) {
			//echo htmlentities($str, ENT_QUOTES, 'cp1251');
			echo $str;
		} else {
			//return htmlentities($str, ENT_QUOTES, 'cp1251');
			return $str;
		}
	}

}
