<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/3/2016
 * Time: 11:39 AM
 */
//if(count(get_included_files()) ==1) exit("Direct access not permitted.");

class GetXml {

    public $xml;
    
    public function __construct($size = 20)
    {
        $this->xml = new SimpleXMLElement('<root/>');
        $this->query($size);
    }

    public function setHeader()
    {
        header('Content-type: text/xml');
    }

    private function query($size)
    {
        $db = simplexml_load_file("./msg.xml") or die("Error: Cannot create object");
        $this->mid = $db->value;
        for ($i = 1; $i <= $size; ++$i) {
            $chuid = $this->rStr(8, 1);
            $track = $this->xml->addChild('message');
            $track->addChild('id', $this->mid);
            $track->addChild('nickname', "chatuser $chuid");
            $track->addChild('mtext', $this->rStr());
            $this->mid += 1;
        }
        $db->value = $this->mid;
        $db->asXML('./msg.xml');
    }
    
    public function rStr($length = 200, $bool = 0) // random string generator
    {

        if ($bool == 0){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;

        } else {
            $characters = '0123456789';}
        return rand(1,$length);
    }

    public function doPrint()    {
        $this->setHeader();
        print($this->xml->asXML());
        exit();
    }
}


if (isset($_GET["lastmsg"]) && $_GET["lastmsg"] == 1){
    $XML = new GetXml(1);
} else {
    $XML = new GetXml();
}
$XML->doPrint();






