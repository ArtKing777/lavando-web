<?php
class PCAPredictFinder
{
    
    //Credit: Thanks to Stuart Sillitoe (http://stu.so/me) for the original PHP that these samples are based on.
    
    private $Key; //The key used to authenticate with the service.
    private $Text; //The search text to find. Ideally a postcode or the start of the address.
    private $Container; //A container for the search. This should only be another Id previously returned from this service when the Type of the result was not 'Address'.
    private $Origin; //A starting location for the search. This can be the name or ISO 2 or 3 character code of a country, WGS84 coordinates (comma separated) or IP address to search from.
    private $Countries; //A comma separated list of ISO 2 or 3 character country codes to limit the search within.
    private $Limit; //The maximum number of results to return.
    private $Language; //The preferred language for results. This should be a 2 or 4 character language code e.g. (en, fr, en-gb, en-us etc).
    private $Data; //Holds the results of the query
    
    function PCAPredictFinder($Key, $Text, $Container, $Origin, $Countries, $Limit, $Language)
    {
        $this->Key = $Key;
        $this->Text = $Text;
        $this->Container = $Container;
        $this->Origin = $Origin;
        $this->Countries = $Countries;
        $this->Limit = $Limit;
        $this->Language = $Language;
    }
    
    function MakeRequest()
    {
        $url = "http://services.postcodeanywhere.co.uk/Capture/Interactive/Find/v1.00/xmla.ws?";
        $url .= "&Key=" . urlencode($this->Key);
        $url .= "&Text=" . urlencode($this->Text);
        $url .= "&Container=" . urlencode($this->Container);
        $url .= "&Origin=" . urlencode($this->Origin);
        $url .= "&Countries=" . urlencode($this->Countries);
        $url .= "&Limit=" . urlencode($this->Limit);
        $url .= "&Language=" . urlencode($this->Language);
        
        //Make the request to Postcode Anywhere and parse the XML returned
        $file = simplexml_load_file($url);
        
        //Check for an error, if there is one then throw an exception
        if ($file->Columns->Column->attributes()->Name == "Error")
        {
            throw new Exception("[ID] " . $file->Rows->Row->attributes()->Error . " [DESCRIPTION] " . $file->Rows->Row->attributes()->Description . " [CAUSE] " . $file->Rows->Row->attributes()->Cause . " [RESOLUTION] " . $file->Rows->Row->attributes()->Resolution);
        }
        
        //Copy the data
        if ( !empty($file->Rows) )
        {
            foreach ($file->Rows->Row as $item)
            {
                $this->Data[] = array('Id'=>$item->attributes()->Id,'Type'=>$item->attributes()->Type,'Text'=>$item->attributes()->Text,'Highlight'=>$item->attributes()->Highlight,'Description'=>$item->attributes()->Description);
            }
        }
    }
    
    function HasData()
    {
        if ( !empty($this->Data) )
        {
            return $this->Data;
        }
        return false;
    }
    
}

//Example usage
//-------------
//$pa = new Capture_Interactive_Find_v1_00 ("AA11-AA11-AA11-AA11","wr5 3da","GB|RM|ENG|3DA-WR5","52.182,-2.222","GB,US,CA","10","");
//$pa->MakeRequest();
//if ($pa->HasData())
    //{
    //   $data = $pa->HasData();
    //   foreach ($data as $item)
        //   {
        //      echo $item["Id"] . "<br/>";
        //      echo $item["Type"] . "<br/>";
        //      echo $item["Text"] . "<br/>";
        //      echo $item["Highlight"] . "<br/>";
        //      echo $item["Description"] . "<br/>";
        //   }
    //}