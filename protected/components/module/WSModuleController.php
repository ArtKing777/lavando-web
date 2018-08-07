<?php
use \Firebase\JWT\JWT;

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class WSModuleController extends Controller
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */

    public $layout = false;

    public $baseModule;
    public $baseUrl;
    public $dataDir;
    public $storageType;
    
    public $user_id;

    public function actions(){
        parent::actions();
        return array(
            'jwtlogin'=>'application.components.actions.JWTLogin',
            'logout'=>'application.components.actions.Logout',
            'thumb'=>'application.components.actions.Thumb',
            'fileupload'=>'application.components.actions.FileUpload'
        );
    }

    public function beforeAction($action){
        parent::beforeAction($action);

        if (isset($this->module)){
            $this->layout = $this->module->layout;
            $this->baseModule = $this->module->baseModule;
            $this->baseUrl = $this->module->baseUrl;
            $this->dataDir = $this->module->dataDir;
            $this->storageType = $this->module->storageType;
        }
        
        return $this->checkAuth($action);        
    }
    
    public function checkAuth0($action){
        $ignoreAuth = array('jwtlogin', 'pura', 'jtp', 'sanux', 'rak', 'roca', 'export', 'exportsigninsheet', 'searchAddresses', 'getAddress', 'getToken');
        
        if (!in_array($action->id, $ignoreAuth)){
            $requestHeaders = Helper::getRequestHeader();
            
            if (! isset($requestHeaders['Authorization'])){
                ResHelper::sendResponse(401, "No authorization header sent");
                exit();
            }
            
            $authorizationHeader = $requestHeaders['Authorization'];
            
            if ($authorizationHeader == null) {
                ResHelper::sendResponse(401, "No authorization header sent");
                exit();
            }
            
            $token = str_replace('Bearer ', '', $authorizationHeader);
            
            $publicKey = <<<EOD
-----BEGIN CERTIFICATE-----
MIIDCTCCAfGgAwIBAgIJP9cfkZZfHBzFMA0GCSqGSIb3DQEBCwUAMCIxIDAeBgNV
BAMTF2luZm92aW5pdHkuZXUuYXV0aDAuY29tMB4XDTE4MDQwMzA3MDMwNloXDTMx
MTIxMTA3MDMwNlowIjEgMB4GA1UEAxMXaW5mb3Zpbml0eS5ldS5hdXRoMC5jb20w
ggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC8x3c8P7oUtjDTNdscAo5c
0e1cAwwK1tIPnVSDweDW7i88lWzrOXXUMvkhguJY+a6ZVOX16j93eK2d5q/c/HE5
waGtEntt4FaAtArdq5xKBr+UbryLLgF5mXJy5SAOKkrFAuEC4W12ErZXcfbjzm6u
Mqut+DF3yQGcOVUV2K59+mdENmu0U/xg4SqwT48Yns3+BqUzhivA05agIJN04ocd
4VdSDV3rxxZVZCRWv27BUYocPKaGshtHfRT+GkthGbuRFWI8G7v1PxN8JgREk0i3
CPPeZ32kKIY//hF/0c5GwsfGpV3/JKxxtER3EfdG/AXbTnCaF9P4L4dc2eQXcMSD
AgMBAAGjQjBAMA8GA1UdEwEB/wQFMAMBAf8wHQYDVR0OBBYEFNz2MaDn2Djbm61c
LQqhL4U7N1zyMA4GA1UdDwEB/wQEAwIChDANBgkqhkiG9w0BAQsFAAOCAQEAHQRL
x8F8fXP433oQvd91fjvC4IzBAKcMsWyOsA9sObRJKWhHeZeTqnVeCKRujjRnWHDY
ov1dHTtXT936USYBPdf971WX7NMfG7mSqr9u7OZddX6QQj/nHHmLO4kyctOB76KB
OTt09oA6MLJw1ZF6TPy6m1ww7tSXffqGCJbNE9gruIn5I8VwJ8umr9JkBmA1vr7R
egc33xuHmMwW4a4Q1QSO5aO4ZUoRh9XKWUUpKqAJ3Tl1XdnQibOVrgW9janr/Tog
fxhCNvawAcuocUakAVGgB9l2IBSVVtDMzPHZJDicIWC7CiZehoMDEUTyzV2duVe+
33PecgWQI9Bu4v5HDA==
-----END CERTIFICATE-----
EOD;
            
            $publicKey = '{"keys":[{"alg":"RS256","kty":"RSA","use":"sig","x5c":["MIIDCTCCAfGgAwIBAgIJP9cfkZZfHBzFMA0GCSqGSIb3DQEBCwUAMCIxIDAeBgNVBAMTF2luZm92aW5pdHkuZXUuYXV0aDAuY29tMB4XDTE4MDQwMzA3MDMwNloXDTMxMTIxMTA3MDMwNlowIjEgMB4GA1UEAxMXaW5mb3Zpbml0eS5ldS5hdXRoMC5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC8x3c8P7oUtjDTNdscAo5c0e1cAwwK1tIPnVSDweDW7i88lWzrOXXUMvkhguJY+a6ZVOX16j93eK2d5q/c/HE5waGtEntt4FaAtArdq5xKBr+UbryLLgF5mXJy5SAOKkrFAuEC4W12ErZXcfbjzm6uMqut+DF3yQGcOVUV2K59+mdENmu0U/xg4SqwT48Yns3+BqUzhivA05agIJN04ocd4VdSDV3rxxZVZCRWv27BUYocPKaGshtHfRT+GkthGbuRFWI8G7v1PxN8JgREk0i3CPPeZ32kKIY//hF/0c5GwsfGpV3/JKxxtER3EfdG/AXbTnCaF9P4L4dc2eQXcMSDAgMBAAGjQjBAMA8GA1UdEwEB/wQFMAMBAf8wHQYDVR0OBBYEFNz2MaDn2Djbm61cLQqhL4U7N1zyMA4GA1UdDwEB/wQEAwIChDANBgkqhkiG9w0BAQsFAAOCAQEAHQRLx8F8fXP433oQvd91fjvC4IzBAKcMsWyOsA9sObRJKWhHeZeTqnVeCKRujjRnWHDYov1dHTtXT936USYBPdf971WX7NMfG7mSqr9u7OZddX6QQj/nHHmLO4kyctOB76KBOTt09oA6MLJw1ZF6TPy6m1ww7tSXffqGCJbNE9gruIn5I8VwJ8umr9JkBmA1vr7Regc33xuHmMwW4a4Q1QSO5aO4ZUoRh9XKWUUpKqAJ3Tl1XdnQibOVrgW9janr/TogfxhCNvawAcuocUakAVGgB9l2IBSVVtDMzPHZJDicIWC7CiZehoMDEUTyzV2duVe+33PecgWQI9Bu4v5HDA=="],"n":"vMd3PD-6FLYw0zXbHAKOXNHtXAMMCtbSD51Ug8Hg1u4vPJVs6zl11DL5IYLiWPmumVTl9eo_d3itneav3PxxOcGhrRJ7beBWgLQK3aucSga_lG68iy4BeZlycuUgDipKxQLhAuFtdhK2V3H2485urjKrrfgxd8kBnDlVFdiuffpnRDZrtFP8YOEqsE-PGJ7N_galM4YrwNOWoCCTdOKHHeFXUg1d68cWVWQkVr9uwVGKHDymhrIbR30U_hpLYRm7kRViPBu79T8TfCYERJNItwjz3md9pCiGP_4Rf9HORsLHxqVd_ySscbREdxH3RvwF205wmhfT-C-HXNnkF3DEgw","e":"AQAB","kid":"MTBDMTRFRjUxRTE4RDA3MTVGNTE5NEI2RTYyQkQwNzc0Q0IzNTIxNQ","x5t":"MTBDMTRFRjUxRTE4RDA3MTVGNTE5NEI2RTYyQkQwNzc0Q0IzNTIxNQ"}]}';
            // $manage = json_decode($publicKey);
            $publicKey = "2Jb0OBtGvqWskip7NFJ1T5UeTygjNxQ3";
            
            $decoded = JWT::decode($token, $publicKey, array('HS256'));
            // $decoded = JWT::decode($token, Helper::YiiParam("jwtKey"));
            
            print_r($decoded);
            return true;
            
            if ($decoded->utype != 'superadmin'){
                ResHelper::sendResponse(403, "Access denied");
                exit();
            }
            
            $this->user_id = $decoded->uid;
        }
        return true;
    }
    
    public function checkAuth($action){
        $ignoreAuth = array('jwtlogin', 'pura', 'jtp', 'sanux', 'rak', 'roca', 'export', 'exportsigninsheet', 'searchAddresses', 'getAddress', 'getToken');        
        
        if (!in_array($action->id, $ignoreAuth)){
            $requestHeaders = Helper::getRequestHeader();

            if (! isset($requestHeaders['Authorization'])){
                ResHelper::sendResponse(401, "No authorization header sent");
                exit();
            }

            $authorizationHeader = $requestHeaders['Authorization'];

            if ($authorizationHeader == null) {
                ResHelper::sendResponse(401, "No authorization header sent");
                exit();
            }

            $token = str_replace('Bearer ', '', $authorizationHeader);
            $decoded = JWT::decode($token, Helper::YiiParam("jwtKey"));

            if ($decoded->utype != 'superadmin'){
                ResHelper::sendResponse(403, "Access denied");
                exit();
            }

            $this->user_id = $decoded->uid;
        }
        return true;
    }

    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
            else
                    $this->render('error', $error);
        }
    }
}