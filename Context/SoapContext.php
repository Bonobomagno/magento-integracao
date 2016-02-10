<?php

namespace Context;

class SoapContext implements IContext {
    
    /**
     *
     * @var \SoapClient
     */
    private static $SOAP_CLIENT;
    private static $SESSION;

    /**
     * 
     * @return SoapClient
     */
    public function GetClient() {
        if (!isset(self::$SOAP_CLIENT)) {
            self::$SOAP_CLIENT = new \SoapClient(\MagentoConfigs::$WSDL_URL);
            $username = \MagentoConfigs::$USERNAME;
            $password = \MagentoConfigs::$API_KEY;
            self::$SESSION = self::$SOAP_CLIENT->login($username, $password);
        }
        
        return self::$SOAP_CLIENT;
    }
    
    /**
     * Retorna a Session de autenticação.
     * @return string
     */
    public function GetSession() {
        return self::$SESSION;
    }
}
