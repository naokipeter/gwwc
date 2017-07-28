<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * @resource User
 */
class UserController extends Controller
{
    public function __construct()
    {
        // Authorize
        $this->authorizeResource(User::class);
    }

    /**
     * Get all users
     */
    public function index()
    {
        if (Auth::guard('api')->user()->isAdmin()) {
            // Return response
            return User::all();
        }

        return [];
    }

    /**
     * Get a user
     */
    public function show(User $user)
    {
        // Return response
        return $user;
    }

    /**
     * Create a user
     */
    public function store(Request $request)
    {
        // Validate
        $this->validateRequest($request);

        // Create
        $user = User::create($request->all());

        // Return response
        return response()->json($user, 201);
    }

    /**
     * Update a user
     */
    public function update(Request $request, User $user)
    {
        // Validate
        $this->validateRequest($request, true);

        // Update
        $user->update($request->all());

        // Return response
        return response()->json($user, 200);
    }

    /**
     * Delete a user
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }

    /**
     * Validate request
     *
     * @param Request $request
     */
    protected function validateRequest(Request $request, $update = false)
    {
        $required = $update ? '' : 'required|';

        // Make sure it's for this user
        $request->request->add(['user_id' => Auth::guard('api')->id()]);

        // Validate
        $this->validate($request, [
            'name'     => $required . 'max:255',
            'pledge'   => $required . 'integer|between:10,100',
            'password' => $required . 'length:60',
            'email'    => $required . 'email',
        ]);
    }
}
