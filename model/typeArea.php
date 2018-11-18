<?php
/*typeAreas(tipo plazas)*/
namespace model;

class TypeArea
{
    private $idTypeArea;
    private $descriptionTypeArea;

    function __construct($descriptionTypeArea)
    {
        $this->$descriptionTypeArea = $descriptionTypeArea;
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

    public function setIdTypeArea($idTypeArea)
    {
        $this->idTypeArea = $idTypeArea;

        return $this;
    }

    public function setDescriptionTypeArea($descriptionTypeArea)
    {
        $this->descriptionTypeArea = $descriptionTypeArea;

        return $this;
    }
}
