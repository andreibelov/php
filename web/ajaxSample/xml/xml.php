<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/3/2016
 * Time: 11:39 AM
 */
//if(count(get_included_files()) ==1) exit("Direct access not permitted.");
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$XML = new GetXml();
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ){$XML->dbWright();}
$XML->doPrint();

class GetXml {

    public $xml;
    private $filename='./msg.xml';
    protected $message;

    public function __construct($size = 20)
    {
        if(file_exists($this->filename)){
            $this->xml = simplexml_load_file($this->filename) or die("Error: Cannot create object");
        } else {
            $this->xml= new SimpleXMLElement("<root />");
        }

    }

    public function setHeader()
    {
        header('Content-type: text/xml');
    }

    public function dbWright()
    {
        $this->listen();
        $message = $this->xml->addChild('message');
        $message->addAttribute('id', '1');
        $message->addChild('timestamp', time());
        $message->addChild('chuid', $this->message->message->chuid);
        $message->addChild('text',"%{".$this->message->message->text."}%");
        $str = $this->xml->saveXML();
        $search = array("%{","}%");
        $repl = array("<![CDATA[","]]>");
        $str = rtrim(str_replace($search, $repl, $str), "\n");
        file_put_contents($this->filename, $str);
        $this->xml = simplexml_load_file($this->filename) or die("Error: Cannot create object");
        return;
    }

    private function listen()
    {
        $this->message = simplexml_load_file('php://input');
    }

    public function rStr($length = 200) // random string generator
    {

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
    }

    public function doPrint()    {
        $this->setHeader();
        print($this->xml->asXML());
        exit();
    }
}


