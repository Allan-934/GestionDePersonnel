<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>Liste des employés</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="fr" />
    <link rel="Stylesheet" type="text/css" href="empsce.css" />
</head>
<body>
<?php
$connexion = mysqli_connect("localhost","root","","empSce");
if ($connexion)
{
    // connexion réussie
    mysqli_set_charset ($connexion,'utf8');
    $requete="select * from employe;";
    $resultat= mysqli_query($connexion, $requete);
    $ligne=mysqli_fetch_assoc($resultat);
    while($ligne)
    {
            echo $ligne["emp_matricule"];echo ", ";
            echo $ligne["emp_nom"];echo ", ";
            echo $ligne["emp_prenom"];echo ", ";
            echo $ligne["emp_service"];echo "<br />";
            $ligne=mysqli_fetch_assoc($resultat);
    }
    mysqli_close($connexion);
}
else
{
    // connexion échouée 
    echo "problème à la connexion <br />";
}
?>
</body>
</html>
