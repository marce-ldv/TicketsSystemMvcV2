<?php

namespace interfaces;
//Interface: Create/ Read / Update / Delete
interface ICrud {
    function create($data);
    function read($data);
    function readAll();
    //function update($data, $idData);
    function update($data);
    function delete($data);
}
