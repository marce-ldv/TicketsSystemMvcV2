<?php

namespace interfaces;

interface ICrud {
    function create($value);
    function read($id);
    function readAll();
    function update($value);
    function delete($id);
}
