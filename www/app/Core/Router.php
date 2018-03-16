<?php 
namespace Core;

class Router {

	public static $request = [];

	public static function get($path, $className) {
		self::$request['GET'][$path] = $className;
	}	
	
	public static function post($path, $className) {
		self::$request['POST'][$path] = $className;
	}

	public static function put($path, $className) {
		self::$request['PUT'][$path] = $className;
	}	

	public static function delete($path, $className) {
		self::$request['DELETE'][$path] = $className;
	}	

	public static function getAllRoutes()
	{
		return self::$request;
	}

	public static function resolve($server) {
		$route = rtrim($server['QUERY_STRING'], '/');
		$method = $server['REQUEST_METHOD'];
		return self::getRoute($method, $route);
	}

	public static function getRoute($method, $route) {

		if (isset(self::$request[$method][$route])) {

			$result = self::$request[$method][$route];
			if (!isset($result['params'])) {
				$result['params'] = [];
			}
			
			return $result;
		}
		
		return false;	
	}

}