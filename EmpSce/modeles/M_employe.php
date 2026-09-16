<?php 
require_once "metiers/Employe.php";
require_once "M_generique.php";
class M_employe extends M_generique
{
        // private $cnx;
        // private function connexion()
        // {
        //     $this->cnx=mysqli_connect("127.0.0.1","root","","empsce");
        //     mysqli_set_charset($this->cnx, "utf8");
        // }
        // private function deconnexion()
        // {
        //     mysqli_close($this->cnx);
        // }


        // public function GetListe()
        // {
        //     $resultat=array();
        //     $this->connexion();
        //     $req="select * from employe";
        //     $res=mysqli_query($this->GetCnx(),$req); 
        //     $ligne=mysqli_fetch_assoc($res);
        //     while ($ligne)
        //     {
        //         $employe=new Employe(    $ligne["emp_matricule"],$ligne["emp_nom"],
        //                                                  $ligne["emp_prenom"],$ligne["emp_service"]);
        //         $resultat[]=$employe;
        //         $ligne=mysqli_fetch_assoc($res);
        //     }
        //     $this->deconnexion();
        //     return $resultat;
        // }

        public function GetListe() // Modification page 8 si il y a un fichier lesEmployes.txt
        {
            $resultat=array();
            $fichier = fopen(__DIR__ . '/lesEmployes.txt', 'r');
            while ($ligne = fgets($fichier))
            {
                $elements=explode("#",$ligne);
                $employe=new Employe($elements[0],$elements[1],$elements[2],$elements[3]);
                $resultat[]=$employe;
            }
            fclose($fichier);
            return $resultat;
        }


}