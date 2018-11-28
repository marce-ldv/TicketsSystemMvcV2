<?php
    
    namespace helpers;
    
    class ToArrayList
    {
        static public function convert ($items) {
            if ($items) {
                $items = (!is_array($items)) ? [$items] : $items;
            } else {
                $items = [];
            }
            return $items;
        }
    }