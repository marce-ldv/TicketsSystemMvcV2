<?php

namespace dao;

class SingletonDAO{
	private static $instance = array();

	static function getInstance(){
		$class = get_called_class();

		if(!isset(self::$instance[$class])){
			self::$instance[$class] = new $class;
		}

		return self::$instance[$class];
	}
}
