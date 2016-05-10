<?php

namespace Proxies\Rest;

use Proxies\IProxy;
use Resources\IResource;
use ProxyResults\ProxyResultBase;
use Filters\FilterBase;

abstract class RestProxyBase implements IProxy {
    
    private $context;
    
    public abstract function GetResourceName();
    
    /**
     * 
     * @return \Context\RestContext
     */
    public function GetContext() {
        if ($this->context === null) {
            $this->context = new \Context\RestContext();
        }
        
        return $this->context;
    }

    /**
     * HTTP Method: GET
     * @return ProxyResultBase
     */
    public function Index(FilterBase $filter) {
        $resourceName = $this->GetResourceName();
        $results = array();
        $page = 1;
        do {
            $from = ($page * 100) + 1;
            $to = ($page * 100) + 100;
            $resourceUri = $this->GetContext()->GetApiUrl() . "/$resourceName?page=$page&limit=100";
            
            try {
                $this->GetContext()->GetClient()->fetch($resourceUri, array(), OAUTH_HTTP_METHOD_GET, $this->GetContext()->GetHeaders());
                $lastResponse = $this->GetContext()->GetClient()->getLastResponse();
                $resources = json_decode($lastResponse);
                
                if(!is_array($resources)) {
                    $resources = array_values(get_object_vars($resources));
                }
                
                $results = array_merge($results, $resources);
                $page++;
            }
            catch (\OAuthException $except) {
                $lastResponse = json_decode($except->lastResponse);
                
                if ($lastResponse == null) {
                    $errors = new \stdClass();
                    $errors->code = 0;
                    $errors->message = $except->lastResponse;
                }
                else {
                    $errors = $lastResponse->messages->error;
                }
                
                if (!is_array($errors)) {
                    $errors = array($errors);
                }
                
                return ProxyResultBase::CreateErrorResult($errors, $except->getMessage());
            }
            
        } while (count($resources) === 100);
        
        return ProxyResultBase::CreateSuccessResult($results);
    }
    
    /**
     * HTTP Method: POST
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function Store(IResource $resource) {
        $resourceName = $this->GetResourceName();
        $resourceUri = $this->GetContext()->GetApiUrl() . "/$resourceName";
        $resourceData = json_encode($resource->ObjectToArray());
        
        try {
            $this->GetContext()->GetClient()->disableRedirects();
            $this->GetContext()->GetClient()->fetch($resourceUri, $resourceData, OAUTH_HTTP_METHOD_POST, $this->GetContext()->GetHeaders());
            $lastResponse = $this->GetContext()->GetClient()->getLastResponse();
            return ProxyResultBase::CreateSuccessResult($lastResponse);
        }
        catch (\OAuthException $except) {
            $lastResponse = json_decode($except->lastResponse);
            $errors = $lastResponse->messages->error;

            if (!is_array($errors)) {
                $errors = array($errors);
            }

            return ProxyResultBase::CreateErrorResult($errors, $except->getMessage());
        }
    }
    
    /**
     * HTTP Method: GET
     * @param int $id
     * @return ProxyResultBase
     */
    public function Show($id) {
        $resourceName = $this->GetResourceName();
        $resourceUrl = $this->GetContext()->GetApiUrl() . "/$resourceName/$id";
        try {
            $this->GetContext()->GetClient()->fetch($resourceUrl, array(), OAUTH_HTTP_METHOD_GET, $this->GetContext()->GetHeaders());
            $lastResponse = $this->GetContext()->GetClient()->getLastResponse();
            $resource = json_decode($lastResponse);
            
            return ProxyResultBase::CreateSuccessResult($resource);
        }
        catch (\OAuthException $except) {
            $lastResponse = json_decode($except->lastResponse);
            $errors = $lastResponse->messages->error;

            if (!is_array($errors)) {
                $errors = array($errors);
            }

            return ProxyResultBase::CreateErrorResult($errors, $except->getMessage());
        }
    }
    
    /**
     * HTTP Method: PUT
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function Update($id, IResource $resource) {
        $resourceName = $this->GetResourceName();
        $resourceUrl = $this->GetContext()->GetApiUrl() . "/$resourceName/$id";
        $resourceData = json_encode($resource->ObjectToArray());
        
        try{
            $this->GetContext()->GetClient()->fetch($resourceUrl, $resourceData, OAUTH_HTTP_METHOD_PUT, $this->GetContext()->GetHeaders());
            $lastResponse = $this->GetContext()->GetClient()->getLastResponse();
            return ProxyResultBase::CreateSuccessResult($lastResponse);
        }
        catch (\OAuthException $except) {
            $lastResponse = json_decode($except->lastResponse);
            $errors = $lastResponse->messages->error;

            if (!is_array($errors)) {
                $errors = array($errors);
            }

            return ProxyResultBase::CreateErrorResult($errors, $except->getMessage());
        }
    }
    
    /**
     * HTTP Method: DELETE
     * @param int $id
     * @return ProxyResultBase
     */
    public function Destroy($id) {
        $resourceName = $this->GetResourceName();
        $resourceUri = $this->GetContext()->GetApiUrl() . "/$resourceName/$id";
        
        try {
            $this->GetContext()->GetClient()->fetch($resourceUri, OAUTH_HTTP_METHOD_DELETE);
            $lastResponse = $this->GetContext()->GetClient()->getLastResponse();
            $resource = json_decode($lastResponse);
            return ProxyResultBase::CreateSuccessResult($resource);
        }
        catch (\OAuthException $except) {
            $lastResponse = json_decode($except->lastResponse);
            $errors = $lastResponse->messages->error;

            if (!is_array($errors)) {
                $errors = array($errors);
            }

            return ProxyResultBase::CreateErrorResult($errors, $except->getMessage());
        }
    }

}
