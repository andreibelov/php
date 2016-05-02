<?php
	require('./incl/class.php');
	$tpl = new pBuild();
	$content = file_get_contents('./tpl/welcome.tpl');
	$main = file_get_contents('./tpl/index.tpl');
	$navbar = file_get_contents('./tpl/navbar.tpl');
	$menu = file_get_contents('./tpl/menu.tpl');
	/*if($_GET["sect"]=="prtnr"&&$_GET["part"]=="list"){
	$content = include('./incl/db_con.php');
	}else{$content = "No content";}*/
	$hreflink = "<a href=\"http://andrw.ru/\">Applicants managment system</a>";
	$content_css="<link type=\"text/css\" rel=\"stylesheet\" media=\"all\" href=\"/css/SpryMenuBarHorizontal.css\" />";
	$temp = array("{PAGE_TITLE}","{PAGE_HEADER}","{NAVBAR}","{SECTION_TITLE}","{SECTION_MENU}","{SECTION_CONTENT}");
	$repl = array("AMS",$content_css,$navbar,$hreflink,$menu,$content);
	$output = str_replace($temp, $repl, $main);
	echo $output;
	$tpl->getTemplate()
?>