<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class User extends ORM {

        public $primary_key = 'id';

        function _init()
        {
                self::$fields = array(
                        'id'                    =>      ORM::field('auto[10]'),
                        'username'              =>              ORM::field('char[64]'),
                        'password'              =>              ORM::field('char[255]'),
                        'email'                 =>              ORM::field('char[255]'),
                );
        }
}