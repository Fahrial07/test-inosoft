<?php

namespace App\Validations\Auth;


use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepository;

class AuthValidation
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Login validation.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function login($request)
    {
        $result = [];
        $result['status'] = false;

        $validate = [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required','min:6']
        ];

        $request->validate($validate);

        $user = $this->userRepository->getUserByEmail($request->email);

        if (!$user) {
            $result['message'] = 'Username or Email is not valid !';

            $result = (object) $result;
            return $result;
        }

        // Check passowrd is correct
        if(!Hash::check($request->password, $user->password)) {
            $result['message'] = 'Incorrect password !';
            $result = (object) $result;
            return $result;
        }

        // Validation success
        $result['status'] = true;
        $result = (object) $result;

        return $result;
    }

    /**
     * Signup validation.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function signup($request)
    {
        $validate = [
            'fullname' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6']
        ];

        $request->validate($validate);

        // Validation sucsess
        $result['status'] = true;
        $result = (object) $result;

        return $result;

    }

}
