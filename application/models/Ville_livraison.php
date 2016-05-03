<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Ville_livraison extends ORM {

        public $primary_key = 'id';

        function _init()
        {

                // Relationship definition
                self::$relationships = array(
                        'adresse_livraison'  => ORM::has_many('\\Model\\Adresse_livraison')
                );
                
                self::$fields = array(
                        'id'                            =>              ORM::field('int[11]'),
                        'code_postal'                   =>              ORM::field('int[15'),
                        'ville'                         =>              ORM::field('char[50]')
                );
        }
}