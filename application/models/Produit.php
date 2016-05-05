<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Produit extends ORM {

        public $primary_key = 'id';

        function _init()
        {
                // Relationship definition
                self::$relationships = array(
                        'categorie'  => ORM::belongs_to('\\Model\\Categorie'),
                        'commande'    => ORM::has_many('\\Model\\Produit\\Commande => \\Model\\Commande')
                );
                
                self::$fields = array(
                        'id'                    =>              ORM::field('int[11]'),
                        'denomination'          =>              ORM::field('char[50]'),
                        'origine'               =>              ORM::field('char[50]'),
                        'prix'                  =>              ORM::field('float'),
                        'typeVente'             =>              ORM::field('char[50]'),
                        'description'           =>              ORM::field('string'),
                        'produit_du_moment'     =>              ORM::field('int[1]'),
                        'produit_phare'         =>              ORM::field('int[1]'),
                        'image'                 =>              ORM::field('char[50]')
                );
        }
}