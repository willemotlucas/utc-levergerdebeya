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
                        'categorie'  => ORM::has_many('\\Model\\Categorie')
                );

                self::$fields = array(
                        'id'                    =>              ORM::field('int[11]'),
                        'denomination'          =>              ORM::field('char[50]')
                );
        }
}