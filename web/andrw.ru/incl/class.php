<?php
	class pBuild
{ 
        private $name;

        public function doPrint($out){
            echo $out;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getName()
        {
            return $this->name;
        }
}
    class dbConn{

    }
?>