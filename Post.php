<?php

class Post {
    protected $contenu;
    protected $date;
    protected $auteur;
    protected $id;

    function __construct(string $contenu, $date, string $auteur, int $id = NULL) {
        $this->contenu = $contenu;
        $this->date = $date;
        $this->auteur = $auteur;
        $this->id = $id;
    }

    function getContenu() {
        return $this->contenu;
    }

    function getDate() {
        return $this->date;
    }

    function getAuteur() {
        return $this->auteur;
    }

    function getId() {
        return $this->id;
    }

    function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    function setId($id) {
        $this->id = $id;
    }


    }    