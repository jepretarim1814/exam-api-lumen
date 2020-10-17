<?php
/**
 * Created by PhpStorm.
 * User: JepreTarim
 * Date: 15/10/2020
 * Time: 10:37 AM
 */

namespace App\Http\Controllers;


use App\Factories\UserFactory;
use App\Services\AuthService;
use App\Services\Validation\RegistrationValidator;
use App\Services\Validation\Validator;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthController extends Controller
{
    use ApiResponser;

    /**
     * @var Validator
     */
    private $validator;

    /**
     * @var AuthService
     */
    private $authService;

    public function __construct(RegistrationValidator $validator, AuthService $authService)
    {
        $this->middleware('auth', ['except' => ['login', 'register', 'logout']]);
        $this->validator = $validator;
        $this->authService = $authService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return $this->successResponse(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        if (! $this->validator->validate($request->all())) {
            return $this->errorResponse($this->validator->errors(), 500);
        }

        $user = (new UserFactory())->create($request->all());

        return $this->successResponse(['user' => $user, 'message' => 'User successfully created.'], 201);
    }

    public function logout()
    {
        try {
            $this->authService->logout();
            return $this->successResponse(['message' => 'Successfully logout'], 200);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function refreshToken()
    {
        try {
            $newToken = $this->authService->refreshToken();
        } catch (TokenInvalidException $e) {
            return $this->errorResponse($e->getMessage(), 401);
        }
        return $this->respondWithToken($newToken);
    }
}
