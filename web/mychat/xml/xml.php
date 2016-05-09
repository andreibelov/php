<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/3/2016
 * Time: 11:39 AM
 */

class MyXml {

    public $xml,$in,$out,$lmid;

    public function __construct($args = array())
    {
        if($this->xml = simplexml_load_file("./msg.xml")){
            $this->lmid = $this->xml->xpath("//root/message[last()]")[0]->id;
        } else {
            $this->xml = new SimpleXMLElement('<root/>');
            $this->lmid = 9031;
        }
    }

    public function doRead()
    {

    }

    public function doWright()
    {
        $id = $this->lmid + 1;
        $obj = $this->xml->addChild('message');
        $obj->addChild('id',$id);
        $obj->addChild('nickname',$this->in->message->nickname);
        $obj->addChild('txt',$this->in->message->msg);
        $this->xml->asXML('./msg.xml');
        $this->lmid +=1;
        return true;
    }

    public function doPrint()
    {
        $this->setHeader();
        print $this->xml->asXML();
        exit();
    }

    public function listen()
    {
        $instream = simplexml_load_file('php://input');
        if(isset($instream->message->msg)){
            $this->in = $instream;
            return true;
        } else {
            return false;
        }


    }

    private function setHeader()
    {
        header('Content-type: text/xml');
    }
}

$XML = new MyXml();
if($XML->listen()){
    $XML->doWright();
}
$XML->doPrint();