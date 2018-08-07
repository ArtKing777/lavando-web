<?php
if (!function_exists('curl_init')) {
    require(dirname(__FILE__) . '/purl/Purl.php');
}
require(dirname(__FILE__) . '/Unirest/HttpMethod.php');
require(dirname(__FILE__) . '/Unirest/HttpResponse.php');
require(dirname(__FILE__) . '/Unirest/Unirest.php');
?>