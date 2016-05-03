<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Adresse_livraison extends ORM {

        public $primary_key = 'id';

        function _init()
        {
                // Define relationships
                self::$relationships = array(
                        'ville_livraison'  => ORM::belongs_to('\\Model\\Ville_Livraison'),
                        'commande'         => ORM::has_many('\\Model\\commande')
                );

                self::$fields = array(
                        'id'                            =>              ORM::field('int[11]'),
                        'adresse'                       =>              ORM::field('char[50]'),
                        'compl_adresse'                 =>              ORM::field('char[50]')
                );
        }
}