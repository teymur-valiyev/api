<?php
namespace Api;

class Abonent {

    private $abonentModel;

    public function __construct()
    {
        $this->abonentModel = new \Models\Abonent();

    }

    public function getAbonentData($abonentId)
    {
        return $this->abonentModel->get($abonentId);
	}

	public function getAllAbonentData()
    {
		return $this->abonentModel->getAll();
	}

	public function updateAbonentData($abonentId,$data)
    {

	}

	public function addAbonentData($data)
    {

	}

	public function deleteAbonentData($abonentId)
    {

	}

}