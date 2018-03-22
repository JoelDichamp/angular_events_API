<?php
class User extends Model implements JsonSerializable {
    
    private $username;
    private $pwd;
    
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getPwd()
    {
        return $this->pwd;
    }

    
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    public function jsonSerialize() {
        return [
             "id" => $this->id,
             "username" => $this->username,
             "pwd" => $this->pwd
        ];
    }

    
    
}