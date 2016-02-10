<?php
/**
 * Example of products list retrieve using Customer account via Magento REST API. OAuth authorization is used
 */
$callbackUrl = "http://localhost/magento/oauth_customer.php";
$temporaryCredentialsRequestUrl = "http://www.bitcao.com.br/oauth/initiate?oauth_callback=" . urlencode($callbackUrl);
$adminAuthorizationUrl = 'http://www.bitcao.com.br/oauth/authorize';
$accessTokenRequestUrl = 'http://www.bitcao.com.br/oauth/token';
$apiUrl = 'http://www.bitcao.com.br/api/rest';
$consumerKey = '102cb586319931a4b0888b640751499c';
$consumerSecret = 'ca777b215ab7b6a292f1baaea41c26de';

try {
    $oauthClient = new OAuth($consumerKey, $consumerSecret, OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_AUTHORIZATION);
    $oauthClient->enableDebug();
    
    $oauthClient->setToken("6b1f5e3862d6f4d0ad1555dad8a9d5b6", "50a78746b174098f8c1c6144b043330d");
    $resourceUrl = "$apiUrl/products";
    $oauthClient->fetch($resourceUrl);
    $productsList = json_decode($oauthClient->getLastResponse());
    print_r($productsList);
    
} catch (OAuthException $e) {
    print_r($e);
}