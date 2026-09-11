<?php
// index.php

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
        case "accueil":
            require_once "controleurs/C_consulterEmployes.php";
            $controleur=new C_consulterEmployes();
            $controleur->action_afficher();
            break;
        default:
            require_once "controleurs/C_consulterEmployes.php";
            $controleur=new C_consulterEmployes();
            $controleur->action_afficher();
            break;
}