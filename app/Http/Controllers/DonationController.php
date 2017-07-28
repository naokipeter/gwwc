<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donation;
use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * @resource Donation
 */
class DonationController extends Controller
{
    public function __construct()
    {
        // Authorize
        $this->authorizeResource(Donation::class);
    }

    /**
     * Get all donations
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        // Authorize (this route isn't taken care of by any Auth policy)
        $this->authorize('view', $user);

        // Return response
        return $user->donations()->orderBy('date', 'desc')->get();
    }

    /**
     * Get a donation
     *
     * @param int      $userId
     * @param Donation $donation
     * @return \Illuminate\Http\Response
     */
    public function show($userId, Donation $donation)
    {
        // Return response
        return $donation;
    }

    /**
     * Create a donation
     *
     * @param \Illuminate\Http\Request  $request
     * @param int $userId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userId)
    {
        // Validate request
        $this->validateRequest($request);

        // Create
        $donation = Donation::create($request->all());

        // Return response
        return response()->json($donation, 201);
    }

    /**
     * Update a donation
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $userId
     * @param Donation                 $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId, Donation $donation)
    {
        // Validate request
        $this->validateRequest($request, true);

        // Update
        $donation->update($request->all());

        // Return response
        return response()->json($donation, 200);
    }

    /**
     * Delete a donation
     *
     * @param int      $userId
     * @param Donation $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId, Donation $donation)
    {
        // Delete
        $donation->delete();

        // Return empty response
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
            'date'     => $required . 'date',
            'charity'  => $required . 'max:255',
            'amount'   => $required . 'numeric|between:0,9999999999',
            'currency' => $required . 'max:3',
        ]);
    }
}
