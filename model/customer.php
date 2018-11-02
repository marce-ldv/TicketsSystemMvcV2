<?php
namespace model;

class Customer
{
	private $id_customer;
	private $id_user;
	private $name;
	private $surname;
	private $dni;




	public function __construct($id_user, $name, $surname, $dni)
	{
		$this->id_user = $id_user;
		$this->name = $name;
		$this->surname = $surname;
		$this->dni = $dni;
	}

    /**
     * @return mixed
     */
    public function getIdCustomer()
    {
    	return $this->id_customer;
    }

    /**
     * @param mixed $id_customer
     *
     * @return self
     */
    public function setIdCustomer($id_customer)
    {
    	$this->id_customer = $id_customer;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
    	return $this->id_user;
    }

    /**
     * @param mixed $id_user
     *
     * @return self
     */
    public function setIdUser($id_user)
    {
    	$this->id_user = $id_user;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
    	return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
    	$this->name = $name;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
    	return $this->surname;
    }

    /**
     * @param mixed $surname
     *
     * @return self
     */
    public function setSurname($surname)
    {
    	$this->surname = $surname;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
    	return $this->dni;
    }

    /**
     * @param mixed $dni
     *
     * @return self
     */
    public function setDni($dni)
    {
    	$this->dni = $dni;

    	return $this;
    }
}
