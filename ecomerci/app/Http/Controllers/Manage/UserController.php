<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\User\StoreUserRequest;
use App\Http\Requests\Manage\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $users = User::all();
        return view('manage.page.user.index', compact('users'));
    }

    public function create()
    {
        return view('manage.page.user.create');
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param
     * @return
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'password'   => Hash::make($request->password),
            'role'       => $request->role,
        ]);

        return redirect()->route('manage.users.index')->with('success', __('messages.created'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('manage.page.user.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param
     * @param  int  $id
     * @return
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        // $user->email = $request->email;
        // $user->phone = $request->phone;
        $user->role = $request->role;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

       return redirect()->route('manage.users.index')->with('success',  __('messages.updated'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('manage.users.index')->with('success', __('messages.deleted'));
    }

   /**
     * block the specified user from storage.
     *
     * @param  int  $id
     * @return
     */
    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->blocked_at = now();
        $user->save();

        return redirect()->route('manage.users.index')->with('success', 'User blocked successfully.');
    }

    /**
     * block the specified user from storage.
     *
     * @param  int  $id
     * @return
     */
    public function unblock($id)
    {
        $user = User::findOrFail($id);
        $user->blocked_at = null;
        $user->save();

        return redirect()->route('manage.users.index')->with('success', 'User unblocked successfully.');
    }
}
