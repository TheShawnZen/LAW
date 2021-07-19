<?php
class Saison{
    private $session;
    //constructeur
    public function __construct($p="Hiver ou Automne XXXX"){
        $this->session = $p;
    }
    public function getSession(){
        return $this->session;
    } 
    public function setSession($name){
        $this->session = $name;
    }
    public function __toString()
	{
		return "Session: ".$this->session;
	}
	public function affiche(){
		echo $this->__toString();
	}
	public function loadFromArray($tab){
		$this->session = $tab["SESSION"];
	}	
}
?>