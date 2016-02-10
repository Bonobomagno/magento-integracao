<?php

namespace ProxyResults;

class ProxyResultBase implements IProxyResult {
    
    private $errors;
    private $message;
    private $result;
    private $success;
    
    public static function CreateSuccessResult($result){
        $successResult = new ProxyResultBase();
        $successResult->success = true;
        $successResult->result = $result;
        $successResult->errors = array();
        $successResult->message = '';
        
        return $successResult;
    }
    
    public static function CreateErrorResult($errors, $message){
        $errorResult = new ProxyResultBase();
        $errorResult->success = false;
        $errorResult->result = null;
        $errorResult->errors = $errors;
        $errorResult->message = $message;
        
        return $errorResult;
    }


    public function GetErrors() {
        return $this->errors;
    }

    public function GetMessage() {
        return $this->message;
    }

    public function GetResult() {
        return $this->result;
    }

    public function IsSuccess() {
        return $this->success;
    }

}
