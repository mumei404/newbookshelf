<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false
    ];

    protected function _setPassword($val)
    {
        if (strlen($val)) {
            $hash = new DefaultPasswordHasher();
            return $hash->hash($val);
        }
    }
}
