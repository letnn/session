<?php
namespace letnn;

class Session
{

	protected static $link;

	public static function single()
    {
		if (is_null(self::$link)) {
			$class = "\letnn\session\\build\\FileHandler";
			self::$link = new $class();
		}
		return self::$link;
	}
    
	public function __call($method, $params)
    {
		return call_user_func_array([self::single(), $method], $params);
	}

	public static function __callStatic($name, $arguments)
    {
		return call_user_func_array([static::single(), $name], $arguments);
	}

}

?>