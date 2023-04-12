<?php
require 'metiers.php';

$unUtilisateur=new Utilisateur(1,'toni','123456','Toni','Rannef','toni.frenna@easydrive.fr');
//le mot de passe (mdp) actuel est 123456
var_dump($unUtilisateur->getIdentite());//Toni Rannef
//artificiel = on crée un historique des mdp de Toni
$unUtilisateur->ajouterMotDePasse('abcd');
$unUtilisateur->ajouterMotDePasse('bcde');
$unUtilisateur->ajouterMotDePasse('123456'); //le mdp actuel 

//essai1
//on tente de renouveler le mdp de Toni avec abcd , qui existe dejà dans l'historique 
$unUtilisateur->renouvelerMDP('abcd'); 
//ECHEC le mdp n'est pas changé
var_dump($unUtilisateur->getMotDePasse());
//l'historique n'est pas changé
var_dump($unUtilisateur->getLesMotsDePasse());

//essai2
//on tente de renouveler le mdp avec azerty, qui n'existe pas dans l'historique
$unUtilisateur->renouvelerMDP('azerty'); 
//SUCCES le mdp est changé
var_dump($unUtilisateur->getMotDePasse());
//l'historique est changé
var_dump($unUtilisateur->getLesMotsDePasse());

?>