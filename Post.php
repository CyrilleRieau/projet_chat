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
    