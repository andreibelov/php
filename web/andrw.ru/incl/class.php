<?php
	class pBuild
{ 
    private $url;
	
	public function getTemplate() {
		$this->url = $_GET["part"];
		ob_start();
		include ($this->url); 
		$this->txt = ob_get_clean();
		return $this->txt;
	}
}
?>