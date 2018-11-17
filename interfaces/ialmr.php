<?php

namespace interfaces;
//Interface: Add/ List / Modify / Remove
interface IAlmr {
    function add($data);
    function list();
    function modify($data);
    function remove($data);
    function viewEdit($data);
}
