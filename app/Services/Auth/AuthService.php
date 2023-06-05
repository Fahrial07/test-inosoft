<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepository;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Login service
     *
     * @param $request
     * @return ArrayObject
     */
    public function login($request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $token = auth()->attempt($data);

        $user = $this->userRepository->getUserByEmail($request->email);
        $user->token = $token;

        $status = true;
        $message = 'Login successfully';

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $user
        ];

        return $result;
    }

    /**
     * Signup service.
     *
     * @param  $request
     * @return  ArrayObject
     */

    public function signup($request)
    {
        //try {
            $data = [
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];

            $user = $this->userRepository->createUser($data);

            $data = [
                '_id' => $user->_id,
                'fullname' => $user->fullname,
                'email' => $user->email,
                'password' => $request->password
            ];

            $token = auth()->attempt($data);

            $user = $this->userRepository->getUserById($user->id);
            $user->token = $token;

            $status = true;
            $message = 'Account successfully registered !';

            $result = (object) [
                'status' => $status,
                'message' => $message,
                'data' => $user,
            ];

            return $result;
        // } catch (\Throwable $th) {
        //     $status = false;
        //     $statusCode = 400;
        //     $message = 'Bad request !';

        //     $result = (object) [
        //         'status' => $status,
        //         'statusCode' => $statusCode,
        //         'message' => $message,
        //     ];

        //     return $result;
        // }
    }



}
