<?php
class FicheJoueur{
    private $idjoueur;
    private $nombreMatch = 0;
    private $points = 0;
    private $lancerEntre = 0;
    private $troisPoints = 0;
    private $lancerFrancEntre = 0;
    private $lancerFrancLance = 0;

    public function __construct($id,$n,$p,$lr,$tp,$lfr,$lfl){
        $this->idjoueur = $id;
        $this->nombreMatch = $n;
        $this->points = $p;
        $this->lancerEntre = $lr;
        $this->troisPoints = $tp;
        $this->lancerFrancEntre= $lfr;
        $this->lancerFrancLance = $lfl;
    }
    //getter
    public function getIdjoueur(){
        return $this->idjoueur;
    }
    public function getNombreMatch(){
        return $this->nombreMatch;
    }
    public function getPoints(){
        return $this->points;
    }  
    public function getLancerEntre(){
        return $this->lancerEntre;
    }
    public function getTroisPoints(){
        return $this->troisPoints;
    }
    public function getLancerFrancEntre(){
        return $this->lancerFrancEntre;
    }
    public function getLancerFrancLance(){
        return $this->lancerFrancLance;
    }
    //setter
    public function setIdjoueur($p_id){
        $this->idjoueur = $p_id;
    }
    public function setNombreMatch($n){
        $this->nombreMatch = $n;
    }
    public function setPoints($p){
        $this->points = $p;
    }
    public function setLancerEntre($lr){
        $this->lancerEntre = $lr;
    }
    public function setTroisPoints($tp){
        $this->troisPoints = $tp;
    }
    public function setLancerFrancEntre($lfr){
        $this->lancerFrancRentre = $lfr;
    }
    public function setLancerFranceLance($lfl){
        $this->lancerFrancLance = $lfl;
    }
    //affichage
    public function __toString(){
        return "Fiche[ID:".$this->idjoueur.", MJ: "
        .$this->nombreMatch.", P: ".$this->points.", LR: ".$this->lancerEntre.", TP: ".$this->troisPoints.", LFR: ".$this->lancerFrancEntre.", LFL: ".$this->lancerFrancLance."]";
	}
	public function affiche()
	{
		echo $this->__toString();
    }
    //load
	public function loadFromArray($tab)
	{
		$this->idjoueur = $tab["IDJOUEUR"];
		$this->nombreMatch = $tab["NOMBREMATCH"];
        $this->points = $tab["POINTS"];
        $this->lancerEntre = $tab["LANCERENTRE"];
        $this->troisPoints = $tab["TROISPOINTS"];
        $this->lanceFrancRentre = $tab["LANCEFRANCRENTRE"];
        $this->lanceFrancLance = $tab["LANCEFRANCLANCE"];
	}	
}
?>