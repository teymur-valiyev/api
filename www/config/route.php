<?php 

	\Core\Router::get(
		'api/abonent',
		[
			'class' => \Api\Abonent::class,
			'method' => 'getAllAbonentData',
		]
	);

	\Core\Router::get(
		'api/abonent/:abonent_id', 
		[
			'class' => \Api\Abonent::class,
			'method' => 'getAbonentData',
			'params' => ['id' => 1]
		]
	);

	\Core\Router::put(
		'api/abonent/:abonent_id', 
		[
			'class' => \Api\Abonent::class,
			'method' => 'updateAbonentData'
		]
	);

	
	\Core\Router::post(
		'api/abonent',
		[
			'class' => \Api\Abonent::class,
			'method' => 'addAbonentData'
		]
	);

	\Core\Router::delete(
		'api/abonent',
		[
			'class' => \Api\Abonent::class,
			'method' => 'deleteAbonentData'
		]
	);



	// "api/subscribe/tv/:abonent_id",
	// "api/subscribe/internet/:abonent_id",
	// "api/unsubscribe/internet/:abonent_id",
	// "api/unsubscribe/internet/:abonent_id",
	// "api/payment/tv/:abonent_id/:amount",
	// "api/payment/internet/:abonent_id/:amount",
	
	// "api/balance/:abonent_id",
	// "api/abonent/account/:abonent_id",// - abonent_id
	// "api/abonent/", //- post
	// "api/abonent/:abonent_id", // - get all info

