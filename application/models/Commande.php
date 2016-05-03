<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Commande extends ORM {

        public $primary_key = 'id';

        function _init()
        {

                // Relationship definition
                self::$relationships = array(
                        'adresse_livraison'     => ORM::belongs_to('\\Model\\Adresse_livraison'),
                        'utilisateur'           => ORM::belongs_to('\\Model\\Utilisateur'),
                        'produit'               => ORM::has_many('\\Model\\Produit\\Commande => \\Model\\Produit')
                );

                self::$fields = array(
                        'id'                     =>              ORM::field('int[11]'),
                        'date_commande'          =>              ORM::field('datetime'),
                        'date_livraison'         =>              ORM::field('datetime'),
                        'type'                   =>              ORM::field('char[50]')
                );
        }
}