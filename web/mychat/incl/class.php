<?php

/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/2/2016
 * Time: 5:17 PM
 */
class pBuild
{
    private $out,$main;
    public $title,$header,$navbar,$menu,$content,$footer;

    public function __construct()
    {
        $this->main = $this->read("index");
    }
    public function read($name){
        $path = "./tpl/".$name.".tpl";
        return file_get_contents($path);
    }

    public function build(){
        $temp = array("{PAGE_TITLE}","{PAGE_HEADER}","{NAVBAR}","{MENU}","{CONTENT}","{FOOTER}");
        $repl = array($this->title,$this->header,$this->navbar,$this->menu,$this->content,$this->footer);
        $this->out = str_replace($temp, $repl, $this->main);
    }
    public function doPrint(){
        echo $this->out;
    }
    public function pExit(){
        exit();
    }
}
/**
 * Class dbConn creates db connection/
 */

class dbConn {

    protected $db_server;
    protected $db_name;
    protected $db_user;
    protected $db_pass;
    public $var = "Smth is wrong!";
    public function __construct()
    {
        $this->dbconn = new mysqli();
        $ini = parse_ini_file("./conf/db.ini");
        $this->db_server = $ini[db_server];
        $this->db_name = $ini[db_name];
        $this->db_user = $ini[db_user];
        $this->db_pass = $ini[db_pass];
        $this->connect();
    }

    private function connect(){
        /* Open connection */
        $this->dbconn->connect($this->db_server, $this->db_user, $this->db_pass, $this->db_name);
        $this->var = "ok!";
        return null;
    }

    public function close()
    {
        /* Close connection */
        $this->dbconn->close();
    }

}