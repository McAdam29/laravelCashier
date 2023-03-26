<?php

    namespace App\Application\Registration\Service;

use App\Application\Registration\Repository\RegistrationRepository;

class RegistrationService {

    /**
     * @var RegistrationRepository
     */
    private $registrationRepo;

    /**
     * Holds Constructor
     *
     * @param RegistrationRepository $registrationRepo -
     */
    public function __construct(
       RegistrationRepository $registrationRepo,
    ) {
        $this->registrationRepo = $registrationRepo;
    }

    /**
     * Get All Users List
     */
    public function getUsersList()
    {
        return $this->registrationRepo->getAllUsers();
    }
}
