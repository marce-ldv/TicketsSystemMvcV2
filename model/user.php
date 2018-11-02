<?php

namespace model;

class User implements \Serializable{

    // TODO: DEBE QUEDAR IGUAL EL MODELO A LA DE LA BASE DE DATOS, ES DECIR EL NOMBRE DE LOS ATRIBUTOS

    private $id_user;
    private $username;
    private $email;
    private $password;
    private $id_role;
    private $id_facebook;

    public function __construct($username='', $password='', $email=''){
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdRole()
    {
        return $this->id_role;
    }

    /**
     * @param mixed $id_role
     *
     * @return self
     */
    public function setIdRole($id_role)
    {
        $this->id_role = $id_role;

        return $this;
    }

    public function serialize(){
        return serialize([
            $this->username,
            $this->email
        ]);
    }

    public function unserialize($data){
        list(
            $this->username,
            $this->email
        ) = unserialize($data);
    }

}
