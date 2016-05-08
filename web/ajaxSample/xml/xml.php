<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/3/2016
 * Time: 11:39 AM
 */
//if(count(get_included_files()) ==1) exit("Direct access not permitted.");
//$xml = file_get_contents("./sample.xml");

class GetXml {

    public $xml;

    public function __construct($size = 20)
    {
        $this->xml = new SimpleXMLElement('<root/>');
        for ($i = 1; $i <= $size; ++$i) {
            $chuid = $this->rStr(8,1);
            $track = $this->xml->addChild('field');
            $track->addChild('msg_id', $i);
            $track->addChild('label', "chatuser $chuid");
            $track->addChild('value', $this->rStr());
        }
    }

    public function setHeader()
    {
        header('Content-type: text/xml');
    }

    public function addChild($l = 200)
    {
        $track = $this->xml->addChild('random');
        $track->addChild('msg', $this->rStr($l));
    }

    public function rStr($length = 20, $bool = 0) // random string generator
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
        print($this->xml->asXML());
        exit();
    }

}

$XML = new GetXml();
$XML->setHeader();
$XML->addChild();
$XML->doPrint();






