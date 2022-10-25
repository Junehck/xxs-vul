<?php
class SQLiteDB extends SQLite3 {
	function __construct() {
		try {
			$this->open(dirname(__FILE__).'/ly.db');
		}
		catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
class DBUtils {
	private static $db;
	private static function instance() {
		if (!self::$db) {
			self::$db = new SQLiteDB();
		}
	}
	/**
* 创建表
* @param string $sql
*/
	public static function create($sql) {
		self::instance();
		$result = @self::$db->query($sql);
		if ($result) {
			return $result;
		}
		return false;
	}
	/**
* 执行增删改操作
* @param string $sql
*/
	public static function execute($sql) {
		self::instance();
		$result = @self::$db->exec($sql);
		if ($result) {
			return true;
		}
		var_dump(@self::$db->lastErrorMsg());
	}
	/**
* 获取记录条数
* @param string $sql
* @return int
*/
	public static function count($sql) {
		self::instance();
		$result = @self::$db->querySingle($sql);
		return $result ? $result : 0;
	}
	/**
* 查询单个字段
* @param string $sql
* @return void|string
*/
	public static function querySingle($sql) {
		self::instance();
		$result = @self::$db->querySingle($sql);
		return $result ? $result : '';
	}
	/**
* 查询单条记录
* @param string $sql
* @return array
*/
	public static function queryRow($sql) {
		self::instance();
		$result = @self::$db->querySingle($sql,true);
		return $result;
	}
	/**
* 查询多条记录
* @param string $sql
* @return array
*/
	public static function queryList($sql) {
		self::instance();
		$result = array();
		$ret = @self::$db->query($sql);
		if (!$ret) {
			return $result;
		}
		while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
			array_push($result, $row);
		}
		return $result;
	}
}

//文件不存在就创建
if(!is_file(dirname(__FILE__).'/ly.db'))
{
    $sql =<<<EOF
      CREATE TABLE msg
      (id integer PRIMARY KEY AUTOINCREMENT,
      name   TEXT,
      title  TEXT,
      comments TEXT);
EOF;
   DBUtils::create($sql);
   DBUtils::execute("INSERT INTO msg(name,title,comments)VALUES('June','flag','flag{thisisflag-blog.mo60.cn}'),('June','车费','居然不报销车费!'),('June','天气','大晴天真不错'),('June','心情','早上心情舒坦'),('June','伙食','汉堡随便吃太好捏'),('June','结束','被打爆了');");
}

?>