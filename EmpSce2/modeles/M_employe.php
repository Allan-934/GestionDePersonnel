<?php
require_once "M_generique.php";
require_once "metiers/Employe.php";
class M_employe extends M_generique
{
    // Ancienne fontions
    // public function GetListe()
    // {
    //     $resultat = array();
    //     $this->connexion();
    //     $req = "select * from employe";
    //     $res = mysqli_query($this->GetCnx(), $req);
    //     $ligne = mysqli_fetch_assoc($res);
    //     while ($ligne) {
    //         $employe = new Employe(
    //             $ligne["emp_matricule"],
    //             $ligne["emp_nom"],
    //             $ligne["emp_prenom"],
    //             $ligne["emp_service"]
    //         );
    //         $resultat[] = $employe;
    //         $ligne = mysqli_fetch_assoc($res);
    //     }
    //     $this->deconnexion();
    //     return $resultat;
    // }
    // public function GetListeService($code)
    // {
    //     $resultat = array();
    //     $this->connexion();
    //     $req = "select * from employe where emp_service='" . $code . "'";
    //     $res = mysqli_query($this->GetCnx(), $req);
    //     $ligne = mysqli_fetch_assoc($res);
    //     while ($ligne) {
    //         $employe = new Employe(
    //             $ligne["emp_matricule"],
    //             $ligne["emp_nom"],
    //             $ligne["emp_prenom"],
    //             $ligne["emp_service"]
    //         );
    //         $resultat[] = $employe;
    //         $ligne = mysqli_fetch_assoc($res);
    //     }
    //     $this->deconnexion();
    //     return $resultat;
    // }

    // Nouvelle fonction qui remplace les deux fonctions précédentes
    public function GetListe($code)
    {
        $resultat = array();
        $this->Connexion();
        if ($code == "all") {
            $req = "select * from employe";
        } else {
            $req = "select * from employe where emp_service='" . $code . "'";
        }
        $res = mysqli_query($this->GetCnx(), $req);
        $ligne = mysqli_fetch_assoc($res);
        while ($ligne) {
            $employe = new Employe(
                $ligne["emp_matricule"],
                $ligne["emp_nom"],
                $ligne["emp_prenom"],
                $ligne["emp_service"]
            );
            $resultat[] = $employe;
            $ligne = mysqli_fetch_assoc($res);
        }
        $this->Deconnexion();
        return $resultat;
    }

    public function GetEmploye($matricule)
    {
        $this->connexion();
        $req = "select * from employe where emp_matricule='" . $matricule . "'";
        $res = mysqli_query($this->GetCnx(), $req);
        $ligne = mysqli_fetch_assoc($res);
        if ($ligne) {
            $resultat = new Employe(
                $ligne["emp_matricule"],
                $ligne["emp_nom"],
                $ligne["emp_prenom"],
                $ligne["emp_service"]
            );
        } else {
            $resultat = null;
        }
        $this->deconnexion();
        return $resultat;
    }

    public function Ajouter($matricule, $nom, $prenom, $service)
    {
        $this->connexion();
        $matricule = mysqli_real_escape_string($this->GetCnx(), $matricule);
        $nom = mysqli_real_escape_string($this->GetCnx(), $nom);
        $prenom = mysqli_real_escape_string($this->GetCnx(), $prenom);
        $service = mysqli_real_escape_string($this->GetCnx(), $service);
        $employe = new Employe($matricule, $nom, $prenom, $service);
        $req = "insert into employe values
        ('" . $matricule . "','" . $nom . "','" . $prenom . "','" . $service . "')";
        $ok = mysqli_query($this->GetCnx(), $req);
        if (!$ok) {
            $employe = null;
        }
        $this->deconnexion();
        return $employe;
    }
}