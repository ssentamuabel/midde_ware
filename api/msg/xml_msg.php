<?php 

// OBJECT DATA


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





// GET ROW POSTED DATA
$xmldata = simplexml_load_string(file_get_contents("php://input"));

// INSTATIATE THE REQUEST DATA OBJECT
$data = new Request(
    (string)$xmldata->method,
    new UserData(
        (string)$xmldata->userdata->username,
        (string)$xmldata->userdata->password
    ),
    new MsgData(
        (string)$xmldata->msgdata->number, 
        (string)$xmldata->msgdata->message,
        (string)$xmldata->msgdata->senderid
    )
);


// SANITIZE AND VALIDATE DATA

// ENCODE IT BACK TO JSON  

header('Content-Type: application/json');

$responseData = array(
    'userdata' => array(
        'username' => $data->userdata->username,
        'password' => $data->userdata->password
    ),
    'msgdata' => array(
        'number' => $data->msgdata->number,
        'message' => $data->msgdata->message,
        'senderid' => $data->msgdata->senderid
    ),
    'method' => $data->method
);
echo json_encode($responseData);

?>