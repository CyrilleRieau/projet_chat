<?php

class Post {
    protected $contenu;
    protected $date;
    protected $id;

    function __construct(string $contenu, $date, int $id = NULL) {
        $this->contenu = $contenu;
        $this->date = $date;
            $this->id = $id;
    }

    function getContenu() {
        return $this->contenu;
    }

    function getDate() {
        return $this->date;
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

    function setId($id) {
        $this->id = $id;
    }


    }    