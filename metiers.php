<?php

class Utilisateur
{
    private $id;
    private $login;
    private $motDePasse;
    private $nom;
    private $prenom;
    private $email;
    private $lesMotsDePasse; //array historique des 3 derniers mdp

    public function __construct($id, $login, $motDePasse, $nom, $prenom, $email)
    {
        $this->id = $id;
        $this->login = $login;
        $this->motDePasse = $motDePasse;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
    }

    public function getIdentite()
    {
        return $this->nom . ' ' . $this->prenom;
    }
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }
    public function getLesMotsDePasse()
    {
        return $this->lesMotsDePasse;
    }

    //ajoute un mdp a l'historique des mots de passe
    public function ajouterMotDePasse($unMotDePasse)
    {
        $this->lesMotsDePasse[] = $unMotDePasse;
    }

    //VRAI si le mdp ne correspond pas à un des 3 derniers mdp
    public function mdpEstNouveau($nouveauMotDePasse)
    {
        foreach ($this->lesMotsDePasse as $unMotDePasse) {
            if ($nouveauMotDePasse == $this->motDePasse) {
                return FALSE;
            }
        }
        return TRUE;
    }

    public function renouvelerMDP($nouveauMotDePasse)
    { //setter sous condition
        if ($this->mdpEstNouveau($nouveauMotDePasse)) {
            $this->motDePasse = $nouveauMotDePasse;
        } //sinon le mot n'est pas changé...
    }
}

