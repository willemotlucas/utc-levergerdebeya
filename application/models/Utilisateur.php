<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Utilisateur extends ORM {

        public $primary_key = 'id';

        function _init()
        {
                // Relationship definition
                self::$relationships = array(
                        'commande'  => ORM::has_many('\\Model\\Commande')
                );
                
                self::$fields = array(
                        'id'                    =>              ORM::field('int[11]'),
                        'email'                 =>              ORM::field('email'),
                        'password'              =>              ORM::field('char[50]'),
                        'nom'                   =>              ORM::field('char[50]'),
                        'prenom'                =>              ORM::field('char[50]'),
                        'date_naissance'        =>              ORM::field('datetime'),
                        'tel_portable'          =>              ORM::field('int[15]'),
                        'tel_domicile'          =>              ORM::field('int[15]'),
                        'adresse'               =>              ORM::field('char[50]'),
                        'compl_adresse'         =>              ORM::field('char[50]'),
                        'code_postal'           =>              ORM::field('int[10]'),
                        'ville'                 =>              ORM::field('char[50]'),
                        'date_creation'         =>              ORM::field('datetime'),
                        'type'                  =>              ORM::field('char[50]')
                );
        }
}