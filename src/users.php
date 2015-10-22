<?php

class user {
    public $id;
    public $username;
    public $email;
    public $accessLevel;
    public $active;

    function __construct($id, $person_username, $email, $accessLevel, $active) {
        $this->email = $email;
        $this->id = $id;
        $this->username = $person_username;
        $this->accessLevel = $accessLevel;
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    function set_email($new_name) {
        $this->email = $new_name;
    }

    function get_email() {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getAccessLevel()
    {
        return $this->accessLevel;
    }

    /**
     * @param mixed $accessLevel
     */
    public function setAccessLevel($accessLevel)
    {
        $this->accessLevel = $accessLevel;
    }


}

