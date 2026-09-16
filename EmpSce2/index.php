<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

        if (!empty($_GET['page']))
        {
                $page=$_GET['page'];
        }
        else
        {
                $page="accueil";
        }
        switch ($page)
        {
                default:
                    require_once "controleurs/C_accueil.php";
                    $controleur=new C_accueil();
                    $controleur->action_afficher();
                    break;
        }
?> 