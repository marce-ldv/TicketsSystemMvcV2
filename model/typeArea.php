<?php
/*typeAreas(tipo plazas)*/
namespace model;

class TypeArea
{
    private $idTypeArea;
    private $descriptionTypeArea;

    function __construct($idTypeArea = "", $descriptionTypeArea = "")
    {
        $this->idTypeArea = $idTypeArea;
        $this->descriptionTypeArea = $descriptionTypeArea;
    }

// getters

    public function getIdTypeArea()
    {
        return $this->idTypeArea;
    }

    public function getDescriptionTypeArea()
    {
        return $this->descriptionTypeArea;
    }

//setters

    public function setIdTypeArea($idTypeArea):void
    {
        $this->idTypeArea = $idTypeArea;
    }

    public function setDescriptionTypeArea($descriptionTypeArea):void
    {
        $this->descriptionTypeArea = $descriptionTypeArea;
    }
}
