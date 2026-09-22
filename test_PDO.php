<?php
 try
{
  // connexion PDO MySQL
  $dsn="mysql:host=127.0.0.1;port=3306;dbname=empsce;charset=utf8";
  $bd=new PDO($dsn, "root", "");
  $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo 'Test 1: Connexion OK<br/><br/>';
}
catch (PDOException $e)
{
  echo 'Echec lors de la connexion : ' . $e->getMessage();
}

$req = "UPDATE employe SET emp_nom = :nom, emp_prenom = :prenom WHERE emp_matricule = :matricule";
$res = $bd->prepare($req);
$data = array(
  ':matricule' => 'e001',
  ':nom' => 'Elric',
  ':prenom' => 'Alphonse',
);

$res->execute($data);
echo 'Test 6: Vérifier dans bd empsce table employe, maj de e001,Elric,Alphonse.<br/><br/>';
?>