<?php
class Joueur{
    private $idjoueur;
    private $nom;
    private $numero;
    private $idequipe;

    public function __construct($p_id,$p_nom,$p_numero,$p_ide){
        $this->idjoueur = $p_id;
        $this->nom = $p_nom;
        $this->numero = $p_numero;
        $this->idequipe = $p_ide;
    }
    public function getIdjoueur(){
        return $this->idjoueur;
    } 
    public function getNom(){
        return $this->nom;
    } 
    public function getNumero(){
        return $this->numero;
    }
    public function getIdequipe(){
        return $this->idequipe;
    }  
    public function setIdjoueur($p_id){
        $this->idjoueur = $p_id;
    }
    public function setNom($p_name){
        $this->nom = $p_name;
    }
    public function setNumero($p_numero){
        $this->numero = $p_numero;
    }
    public function setIdequipe($p_ide){
        $this->idequipe = $p_ide;
    }
    public function __toString(){
		return "Joueur[ID:".$this->idjoueur.", Nom: ".$this->nom.",#: ".$this->numero.",Équipe: ".$this->idequipe."]";
	}
	public function affiche()
	{
		echo $this->__toString();
	}
	public function loadFromArray($tab)
	{
		$this->idjoueur = $tab["IDJOUEUR"];
		$this->nom = $tab["NOM"];
        $this->numero = $tab["NUMERO"];
        $this->idequipe = $tab["IDEQUIPE"];
	}	
}
?>