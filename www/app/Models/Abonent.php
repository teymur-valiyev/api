<?php 

namespace Models;

class Abonent extends AbstructModel {

	protected $tableName = "abonent";
	protected $primaryField = "id";

	protected $fileds = [
		"name",
		"surname",
		"description",
		"address",
		"balance"
	];
}