<?php 
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

?>