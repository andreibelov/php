<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/2/2016
 * Time: 4:46 PM
 */
include_once ('./incl/class.php');

$page = new pBuild();
if($_GET[xml] == 1){
    $xml = file_get_contents("./sample.xml");
    print $xml;
    exit();
} else {
    $content = "";
    if(true){
        $page->title = "Чатик";
        $page->header = "HEADER";
        $page->navbar = "NAVIGATION";
        $page->menu = "меню";
        $page->content = $content;
        $page->footer = "нижний колонтитул";
    } else{
        $page->content = "Access denied!";
    }
    $page->build();
    $page->doPrint();
    $page->pExit();
}