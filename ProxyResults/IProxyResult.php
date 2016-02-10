<?php

namespace ProxyResults;

interface IProxyResult {
    
    public function IsSuccess();
    public function GetMessage();
    public function GetResult();
    public function GetErrors();
    
}
