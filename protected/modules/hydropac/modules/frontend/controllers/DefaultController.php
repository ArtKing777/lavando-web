<?php
class DefaultController extends WSModuleController
{
    
    public function actionGetToken(){
        
        $url = 'http://www.google-analytics.com/collect';
        $params = 'v=1&t=event&tid=UA-100820335-2&cid=555&ec=Button&ea=Place%20Order(Payment)&el=Web%20Booking';

        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );
        
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);
        
        $card_number = $param['card_number'];
        $card_mm = $param['card_mm'];
        $card_yyyy = $param['card_yyyy'];
        $card_cvv = $param['card_cvv'];
        $live = $param['live'];
        
        
        if ($live){
            $apiKey = "pk_live_SjCQHywFPTSoSDEbudybv4EG";
        }
        else {
            $apiKey = "pk_test_tpm8npjnTwr7Dy17O2DugMOh";
        }
        
        
        \Stripe\Stripe::setApiKey($apiKey);
        
        /*
        $a = \Stripe\Token::create(array(
            "card" => array(
                "number" => "4242424242424242",
                "exp_month" => 4,
                "exp_year" => 2019,
                "cvc" => "314"
            )
        ));
        */
        
        try {
            $a = \Stripe\Token::create(array(
                "card" => array(
                    "number" => $card_number,
                    "exp_month" => $card_mm,
                    "exp_year" => $card_yyyy,
                    "cvc" => $card_cvv
                )
            ));
            
            $res['rslt'] = 1;
            $res['msg'] = $a;
            
        } catch(\Stripe\Error\Card $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
            
            $res['rslt'] = 2;
            $res['msg'] = $err['message'];
        }
        
        $json = CJSON::encode($res);
        ResHelper::sendResponse(200, $json);
        
    }
    
    public function getContainerAddresses($postcode, $contId){
        $fdata = array();
        
        
        $pa = new PCAPredictFinder("NN37-HC22-UB98-MK69",$postcode, $contId, "51.509865, -0.118092","GB","1000","");
            $pa->MakeRequest();
            if ($pa->HasData())
            {
               $data = $pa->HasData();
               
               $json = CJSON::encode($data); 
               // ResHelper::sendResponse(200, $json);
               // return;
               $type = (string)$item["Type"][0];
               
               
               foreach ($data as $item)
               {
                   $type = (string)$item["Type"][0];
                   
                   if ($type == "Address"){
                       // $tdata = array();
                       // $value = (string) $xml->code[0]->lat;
                       $tdata['Id'] = (string) $item["Id"][0];
                       $tdata['Type'] =(string)  $item["Type"][0];
                       $tdata['Text'] = (string) $item["Text"][0];
                       $tdata['Highlight'] =(string)  $item["Highlight"][0];
                       $tdata['Description'] =(string)  $item["Description"][0];
                       $fdata[] = $tdata;
                   }
               }
            }
            return $fdata;
    }
    
    public function actionSearchAddresses(){
        $url = 'http://www.google-analytics.com/collect';
        $paramss = array(
            'v' => 1, // Version
            'tid' => 'UA-100820335-2', // Tracking ID
            'cid' => 555, // Anonymous Client ID.
            't' => 'event', // hit type
            'ec' => 'Button', // category
            'ea' => 'Collect', // action
            'el' => 'Web Booking', // label
        );
        $params = 'v=1&t=event&tid=UA-100820335-2&cid=555&ec=Button&ea=Collect&el=Web%20Booking';

        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );
        
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);
        $fdata = array();
        
        if (isset($param['postcode'])){
            $pa = new PCAPredictFinder("NN37-HC22-UB98-MK69",$param['postcode'],"","51.509865, -0.118092","GB","1000","");
            $pa->MakeRequest();
            if ($pa->HasData())
            {
               $data = $pa->HasData();
               
               $json = CJSON::encode($data); 
               // ResHelper::sendResponse(200, $json);
               // return;
               $type = (string)$item["Type"][0];
               
               // print_r($data);
               
               foreach ($data as $item)
               {
                   $type = (string)$item["Type"][0];
                   
                   //echo $type;
                   //return;
                   
                   if ($type == "Address"){
                       // $tdata = array();
                       // $value = (string) $xml->code[0]->lat;
                       $tdata['Id'] = (string) $item["Id"][0];
                       $tdata['Type'] =(string)  $item["Type"][0];
                       $tdata['Text'] = (string) $item["Text"][0];
                       $tdata['Highlight'] =(string)  $item["Highlight"][0];
                       $tdata['Description'] =(string)  $item["Description"][0];
                       $fdata[] = $tdata;
                   }
                   else if ($type == "Postcode"){
                       $contId = (string) $item["Id"][0];
                       $fdata = $this->getContainerAddresses($param['postcode'], $contId);
                   }
               }
               $json = Jsonize::encode($fdata);
               ResHelper::sendResponse(200, $json);
            } 
        }        
    } 
    
    public function actionGetAddress(){
        
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);
        
        if (isset($param['address'])){
            $pa = new PCAPredictDetailer("NN37-HC22-UB98-MK69", $param['address'], "{Latitude}", "{Longitude}");
            $pa->MakeRequest();
            if ($pa->HasData())
            {
                $data = $pa->HasData();
                $json = CJSON::encode($data);
                $fdata = array();
                foreach ($data as $item)
                {     
                    
                    $tdata['Id'] = (string)  $item["Id"][0];
                    $tdata['DomesticId'] = (string)  $item["DomesticId"][0];
                    $tdata['Language'] = (string)  $item["Language"][0];
                    $tdata['LanguageAlternatives'] = (string)  $item["LanguageAlternatives"][0];
                    $tdata['Department'] = (string)  $item["Department"][0];
                    $tdata['Company'] = (string)  $item["Company"][0];
                    $tdata['SubBuilding'] = (string)  $item["SubBuilding"][0];
                    $tdata['BuildingNumber'] = (string)  $item["BuildingNumber"][0];
                    $tdata['BuildingName'] = (string)  $item["BuildingName"][0];
                    $tdata['SecondaryStreet'] = (string)  $item["SecondaryStreet"][0];
                    $tdata['Street'] = (string)  $item["Street"][0];
                    $tdata['Block'] = (string)  $item["Block"][0];
                    $tdata['Neighbourhood'] = (string)  $item["Neighbourhood"][0];
                    $tdata['District'] = (string)  $item["District"][0];
                    $tdata['City'] = (string)  $item["City"][0];
                    $tdata['Line1'] = (string)  $item["Line1"][0];
                    $tdata['Line2'] = (string)  $item["Line2"][0];
                    $tdata['Line3'] = (string)  $item["Line3"][0];
                    $tdata['Line4'] = (string)  $item["Line4"][0];
                    $tdata['Line5'] = (string)  $item["Line5"][0];
                    $tdata['AdminAreaName'] = (string)  $item["AdminAreaName"][0];
                    $tdata['AdminAreaCode'] = (string)  $item["AdminAreaCode"][0];
                    $tdata['Province'] = (string)  $item["Province"][0];
                    $tdata['ProvinceName'] = (string)  $item["ProvinceName"][0];
                    $tdata['ProvinceCode'] = (string)  $item["ProvinceCode"][0];
                    $tdata['PostalCode'] = (string)  $item["PostalCode"][0];
                    $tdata['CountryName'] = (string)  $item["CountryName"][0];
                    $tdata['CountryIso2'] = (string)  $item["CountryIso2"][0];
                    $tdata['CountryIso3'] = (string)  $item["CountryIso3"][0];
                    $tdata['CountryIsoNumber'] = (string)  $item["CountryIsoNumber"][0];
                    $tdata['SortingNumber1'] = (string)  $item["SortingNumber1"][0];
                    $tdata['SortingNumber2'] = (string)  $item["SortingNumber2"][0];
                    $tdata['Barcode'] = (string)  $item["Barcode"][0];
                    $tdata['POBoxNumber'] = (string)  $item["POBoxNumber"][0];
                    $tdata['Label'] = (string)  $item["Label"][0];
                    $tdata['Type'] = (string)  $item["Type"][0];
                    $tdata['DataLevel'] = (string)  $item["DataLevel"][0];
                    $tdata['Field1'] = (string)  $item["Field1"][0];
                    $tdata['Field2'] = (string)  $item["Field2"][0];
                    $tdata['Field3'] = (string)  $item["Field3"][0];
                    $tdata['Field4'] = (string)  $item["Field4"][0];
                    $tdata['Field5'] = (string)  $item["Field5"][0];
                    $tdata['Field6'] = (string)  $item["Field6"][0];
                    $tdata['Field7'] = (string)  $item["Field7"][0];
                    $tdata['Field8'] = (string)  $item["Field8"][0];
                    $tdata['Field9'] = (string)  $item["Field9"][0];
                    $tdata['Field10'] = (string)  $item["Field10"][0];
                    $tdata['Field11'] = (string)  $item["Field11"][0];
                    $tdata['Field12'] = (string)  $item["Field12"][0];
                    $tdata['Field13'] = (string)  $item["Field13"][0];
                    $tdata['Field14'] = (string)  $item["Field14"][0];
                    $tdata['Field15'] = (string)  $item["Field15"][0];
                    $tdata['Field16'] = (string)  $item["Field16"][0];
                    $tdata['Field17'] = (string)  $item["Field17"][0];
                    $tdata['Field18'] = (string)  $item["Field18"][0];
                    $tdata['Field19'] = (string)  $item["Field19"][0];
                    $tdata['Field20'] = (string)  $item["Field20"][0];
                    
                    $fdata[] = $tdata;
                }
                $json = Jsonize::encode($fdata);
                ResHelper::sendResponse(200, $json);
            }
        }
        
    } 
}