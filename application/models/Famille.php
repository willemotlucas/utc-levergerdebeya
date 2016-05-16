<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Famille extends ORM {

        public $primary_key = 'id';

        function _init()
        {
                // Relationship definition
                self::$relationships = array(
                        'categories'  => ORM::has_many('\\Model\\Categorie')
                );

                self::$fields = array(
                        'id'                    =>              ORM::field('int[11]'),
                        'denomination'          =>              ORM::field('char[50]', array('required', 'max_length[50]')),
                        'image'                 =>              ORM::field('char[150]', array('max_length[150]'))
                );
        }
}