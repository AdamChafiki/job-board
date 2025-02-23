<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
  /**
   * Register  user
   *
   * @return \Illuminate\Http\Response
   */
  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required',
      'role' => 'required|in:seeker,employer',
      'c_password' => 'required|same:password',
    ]);

    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
    }

    $input = $request->all();
    $input['password'] = bcrypt($input['password']);
    $user = User::create($input);
    $success['name'] =  $user->name;

    return $this->sendResponse($success, 'User register successfully.');
  }

  /**
   * Login  user
   *
   * @return \Illuminate\Http\Response
   */
  public function login(Request $request)
  {
    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
      return $this->sendError('These credentials do not match our records.');
    }

    $token = $user->createToken($user->name)->plainTextToken;


    $response = [
      'user' => $user,
      'token' => $token
    ];

    return $this->sendResponse($response, 'User login successfully.');
  }
  /**
   * Logout  user
   *
   * @return \Illuminate\Http\Response
   */
  public function logout(Request $request)
  {
    $request->user()->tokens()->delete();
    return $this->sendResponse([], 'User logout successfully.');
  }
}
