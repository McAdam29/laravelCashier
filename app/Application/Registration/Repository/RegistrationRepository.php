<?php

    namespace App\Application\Registration\Repository;

use App\Application\Core\Repository\CoreRpository;
use App\Models\RegisteredUsers;

class RegistrationRepository implements CoreRpository {

    public function getAllUsers()
    {
        return RegisteredUsers::all();
    }
}
