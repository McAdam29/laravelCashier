<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\Registration\Service\RegistrationService;

class RegisteredUserController extends Controller
{
    /**
     * Holds Registration Service
     *
     * @var RegistrationService
     */
    private $registrationService;

    /**
     * Holds Constructor
     *
     * @param RegistrationService $registrationService -
     */
    public function __construct(
        RegistrationService $registrationService
    ) {
        $this->registrationService = $registrationService;
    }

    /**
     * get Users Lists
     */
    public function saveUsers(Request $request)
    {
        $postdata = $request->only(['full_name', 'username', 'password']);
    }
}
