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
                        'id'                    =>              ORM::field('int[11]', array('required')),
                        'email'                 =>              ORM::field('email', array('required','max_length[50]')),
                        'password'              =>              ORM::field('char[50]', array('required', 'min_length[8]', 'max_length[50]')),
                        'nom'                   =>              ORM::field('char[50]', array('required', 'max_length[50]')),
                        'prenom'                =>              ORM::field('char[50]', array('required', 'max_length[50]')),
                        'date_naissance'        =>              ORM::field('datetime'),
                        'tel_portable'          =>              ORM::field('int[15]', array('max_length[15]')),
                        'tel_domicile'          =>              ORM::field('int[15]', array('max_length[15]')),
                        'adresse'               =>              ORM::field('char[50]', array('max_length[50]')),
                        'compl_adresse'         =>              ORM::field('char[50]', array('max_length[50]')),
                        'code_postal'           =>              ORM::field('int[10]', array('max_length[10]')),
                        'ville'                 =>              ORM::field('char[50]', array('max_length[50]')),
                        'date_creation'         =>              ORM::field('datetime'),
                        'type'                  =>              ORM::field('char[50]')
                );
        }
}