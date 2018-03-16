<?php 

namespace Core;

class App {

	private $request;

	public function __construct($config, $request) {
		$this->request = $request;
        call_user_func_array("\Core\Database::setConfig", $config['db']);
    }

	public function run() {
        $response = $this->resolve();
        $jsonResponse = new \Core\JsonResponse($response);
        $jsonResponse->sendResponse();
	}

	private function resolve() {
		try {
            $route = \Core\Router::resolve($this->request);
            if (!empty($route)) {
                $classInstance = new $route['class'];

                $response = call_user_func_array(
                    [$classInstance, $route['method']],
                    $route['params']
                );
            } else {
                throw new \Exception("404 NOT Found");
            }
        } catch (\Exception $e) {
            $this->notFound($e->getMessage());
            exit;
        }

		return $response;
	}

	public function notFound($message) {
        $notFoundResponse = new \Core\NotFoundResponse($message);
        $notFoundResponse->sendResponse();
	}

	public function setup() {
        \Core\Setup::setupTables();
        \Core\Setup::setupData();
    }
}