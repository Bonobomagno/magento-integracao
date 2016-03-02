<?php

namespace ProxyResults;

class ProxyResultBase implements IProxyResult {
    
    private $errors;
    private $message;
    private $result;
    private $success;
    
    /**
     * Create a success result.
     * @param type $result
     * @return \ProxyResults\ProxyResultBase
     */
    public static function CreateSuccessResult($result){
        $successResult = new ProxyResultBase();
        $successResult->success = true;
        $successResult->result = $result;
        $successResult->errors = array();
        $successResult->message = '';
        
        return $successResult;
    }
    
    /**
     * Create an error result.
     * @param array $errors
     * @param string $message
     * @return \ProxyResults\ProxyResultBase
     */
    public static function CreateErrorResult($errors, $message){
        $errorResult = new ProxyResultBase();
        $errorResult->success = false;
        $errorResult->result = null;
        $errorResult->errors = $errors;
        $errorResult->message = $message;
        
        return $errorResult;
    }

    /**
     * Return list of errors from result.
     * @return array
     */
    public function GetErrors() {
        return $this->errors;
    }

    /**
     * Return error message.
     * @return string
     */
    public function GetMessage() {
        return $this->message;
    }

    /**
     * Return success data from result.
     * @return type
     */
    public function GetResult() {
        return $this->result;
    }

    /**
     * Return success status.
     * @return boolean
     */
    public function IsSuccess() {
        return $this->success;
    }

}
