<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Produit_commande extends ORM {

        public $primary_key = 'id';

        function _init()
        {
                // Relationship definition
                self::$relationships = array(
                        'commande' => ORM::belongs_to('\\Model\\Commande'),
                        'produit'  => ORM::belongs_to('\\Model\\Produit'),
                );
                
                self::$fields = array(
                        'id'                    =>              ORM::field('int[11]'),
                        'produit_id'            =>              ORM::field('int[11]'),
                        'commande_id'           =>              ORM::field('int[11]'),
                        'quantite'              =>              ORM::field('int[10]')
                );
        }
}