<?php
    class Matchs {
        private $id;
        private $session;
        private $idDomicile;
        private $idVisiteur;
        private $scoreDomicile;
        private $scoreVisiteur;
        private $dateMatch;
        private $resultatFinal;

        // constructeur
        public function __construct($id, $sess, $dom, $vis, $scoreDom, $scoreVis, $date, $resultat){
            $this->id=$id;
            $this->session=$sess;
            $this->idDomicile=$dom;
            $this->idVisiteur=$vis;
            $this->scoreDomicile=$scoreDom;
            $this->scoreVisiteur=$scoreVis;
            $this->dateMatch= $date;
            $this->resultatFinal=$resultat;
        }

        // setters
        public function setId($id){
            $this->id=$id;
        }

        public function setSession($sess){
            $this->session=$sess;
        }

        public function setDomicile($dom){
            $this->idDomicile=$dom;
        }

        public function setVisiteur($vis){
            $this->idVisiteur=$vis;
        }

        public function setScoreDomicile($scoreDom){
            $this->scoreDomicile=$scoreDom;
        }

        public function setScoreVisiteur($scoreVis){
            $this->scoreVisiteur=$scoreVis;
        }

        public function setDateMatch($date){
            $this->dateMatch=$date;
        }

        public function setResultatFinal($resultat){
            $this->resultatFinal=$resultat;
        }

        // getters
         public function getId(){
            return $this->id;
        }

        public function getSession(){
            return $this->session;
        }

        public function getIdDomicile(){
            return $this->idDomicile;
        }

        public function getIdVisiteur(){
            return $this->idVisiteur;
        }

        public function getScoreDomicile(){
            return $this->scoreDomicile;
        }

        public function getScoreVisiteur(){
            return $this->scoreVisiteur;
        }

        public function getDateMatch(){
            return $this->dateMatch;
        }

        public function getResultatFinal(){
            return $this->resultatFinal;
        }

        // toString
        public function __toString(){
            return "[".$this->id."] - Session: ".$this->session." ID Domicile: ".$this->idDomicile." Score Domicile: ".$this->scoreDomicile." ID Visiteur: ".$this->idVisiteur." Score Visiteur: ".$this->scoreVisiteur." & a été joué le ".$this->dateMatch." et le match ".$this->resultatFinal;
        }

        // load from array
        public function loadFromArray($arr){
            $this->id=$arr["IDMATCH"];
            $this->session=$arr["SESSIONLAW"];
            $this->idDomicile=$arr["IDDOMICILE"];
            $this->idVisiteur=$arr["IDVISITEUR"];
            $this->scoreDomicile=$arr["SCOREDOMICILE"];
            $this->scoreVisiteur=$arr["SCOREVISITEUR"];
            $this->dateMatch=$arr["DATEMATCH"];
            $this->résultatFinal=$arr["RESULTATFINAL"];
        }
    }
?>