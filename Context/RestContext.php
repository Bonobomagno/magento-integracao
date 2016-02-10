<?php

namespace Context;

class RestContext implements IContext {
    
    private static $OAUTH_CLIENT;
    private static $TIME;
    
    /**
     * 
     * @return \OAuth
     */
    public function GetClient() {
        
        if (!isset(self::$OAUTH_CLIENT) || $this->IsTimeOutExpired()) {
            self::$TIME = new \DateTime('now');
            self::$OAUTH_CLIENT = new \OAuth(
                \MagentoConfigs::$CONSUMER_KEY, 
                \MagentoConfigs::$CONSUMER_SECRET, 
                OAUTH_SIG_METHOD_HMACSHA1, 
                OAUTH_AUTH_TYPE_AUTHORIZATION
            );
            self::$OAUTH_CLIENT->enableDebug();

            self::$OAUTH_CLIENT->setToken(
                \MagentoConfigs::$ACCESS_TOKEN, 
                \MagentoConfigs::$ACCESS_TOKEN_SECRET
            );
        }
        
        return self::$OAUTH_CLIENT;
    }
    
    public function GetApiUrl() {
        return \MagentoConfigs::$API_URL;
    }
    
    /**
     * 
     * @return array
     */
    public function GetHeaders() {
        
        return array(
            'HTTP/1.1 200 OK',
            'Content-Type' => \MagentoConfigs::$CONTENT_TYPE,
            'Content_Type' => \MagentoConfigs::$CONTENT_TYPE,
            'Accept' => '*/*'
        );
    }
    
    private function IsTimeOutExpired() {
        if (!isset(self::$TIME)) {
            return false;
        }
        
        $now = new \DateTime('now');
        
        $diffInSeconds = $now->getTimestamp() - self::$TIME->getTimestamp();
        
        return $diffInSeconds > 120;
    }
}
