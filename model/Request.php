<?php


class UserData{
    public $username;
    public $password;


    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
}

class MsgData{
    public $number;
    public $message;
    public $senderid;

    // CONSTRUCTOR
    public function __construct($number, $message, $senderid)
    {
        $this->number = $number;
        $this->message = $message;
        $this->senderid = $senderid;
    }
}


class Request{
    public $method;
    public $userdata;
    public $msgdata;


    // CONSTRUCTOR
    public function __construct($method, UserData $userdata, MsgData $msgdata)
    {

        $this->method = $method;
        $this->userdata = $userdata;
        $this->msgdata = $msgdata;
    }
}

?>