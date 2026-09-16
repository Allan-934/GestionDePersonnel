<?php
require_once "modeles/M_employe.php";
class C_consulterEmployes
{
    private $data;
        private $modele_employe;
        public function __construct()
        {
            $this->data=array() ;
            $this->modele_employe=new M_employe();
        }
        public function action_afficher()
        {
            $this->data['lesEmployes']=$this->modele_employe->GetListe();
            require_once "vues/v_listeEmployes.php";
        }
}