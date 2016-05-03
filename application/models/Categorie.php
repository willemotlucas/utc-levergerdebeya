<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Categorie extends ORM {

        public $primary_key = 'id';

        function _init()
        {
        	    // Relationship definition
		        self::$relationships = array(
		                'famille'  => ORM::belongs_to('\\Model\\Famille'),
		                'produit'  => ORM::has_many('\\Model\\Produit')
		        );

                self::$fields = array(
                        'id'                    =>              ORM::field('int[11]'),
                        'denomination'          =>              ORM::field('char[50]')
                );
        }
}