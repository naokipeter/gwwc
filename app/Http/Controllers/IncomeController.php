<?php

namespace App\Http\Controllers;

use App\Income;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @resource Income
 */
class IncomeController extends Controller
{
    public function __construct()
    {
        // Authorize
        $this->authorizeResource(Income::class);
    }

    /**
     * Display a listing of incomes.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        // Authorize action
        $this->authorize('view', $user);

        // Return response
        return $user->incomes()->orderBy('year', 'desc')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param int         $userId
     * @param \App\Income $income
     * @return \Illuminate\Http\Response
     */
    public function show($userId, Income $income)
    {
        return $income;
    }

    /**
     * Store a newly created income in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $userId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userId)
    {
        // Validate
        $this->validateRequest($request);

        // Create
        $income = Income::create($request->all());

        // Return response
        return response()->json($income, 201);
    }

    /**
     * Update the specified income in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $userId
     * @param  \App\Income             $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId, Income $income)
    {
        // Validate
        $this->validateRequest($request, true);

        // Update
        $income->update($request->all());

        // Return response
        return response()->json($income, 200);
    }

    /**
     * Remove the specified income from storage.
     *
     * @param int         $userId
     * @param \App\Income $income
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId, Income $income)
    {
        // Delete
        $income->delete();

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
            'year'               => $required . 'date_format:Y',
            'percentage_pledged' => $required . 'integer|between:10,100',
            'amount'             => $required . 'numeric|between:0,9999999999',
            'currency'           => $required . 'max:3',
        ]);
    }
}
