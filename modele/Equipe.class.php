<?php
    class Equipe {
        // attributs
        private $id=0;
        private $nom="";
        private $victoires=0;
        private $defaites=0;
        private $nuls=0;

        // constructeur
        public function __construct($id, $nom, $vic, $def, $nul){
			$this->id = $id;
			$this->nom = $nom;
			$this->victoires = $vic;
			$this->defaites = $def;
			$this->nuls = $nul;
        }

        // setters
        public function setId($id){
            $this->id=$id;
        }

        public function setNom($nom){
            $this->nom=$nom;
        }

        public function setVictoires($vic){
            $this->victoires=$vic;
        }

        public function setDefaites($def){
            $this->defaites=$def;
        }

        public function setNuls($nul){
            $this->nuls=$nul;
        }

        // getters
        public function getId(){
            return $this->id;
        }

        public function getNom(){
            return $this->nom;
        }

        public function getVictoires(){
            return $this->victoires;
        }

        public function getDefaites(){
            return $this->defaites;
        }

        public function getNuls(){
            return $this->nuls;
        }

        // toString
        public function __toString(){
            return "[".$this->id."] - ".$this->nom." Victoires/Défaites/Nuls ".$this->victoires.$this->defaites.$this->nuls;
        }

        // load from array
        public function loadFromArray($arr){
            $this->id=$arr["IDEQUIPE"];
            $this->nom=$arr["NOM"];
            $this->victoires=$arr["VICTOIRES"];
            $this->défaites=$arr["DEFAITES"];
            $this->nuls=$arr["MATCHSNULS"];
        }
    }
?>