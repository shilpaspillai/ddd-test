<?php

namespace app\lib\Domain\Factory\User;

use app\lib\Domain\Entity\User\Entity as uEntity;
use app\lib\Storage\Repository\User\Repository as UserRepository;

class Factory {

    public static function create($user_config) {

        $user_entity = new uEntity();

        foreach ($user_config as $key => $value) {
            $user_entity->$key = $value;
        }

        return $user_entity;
    }

}

?>