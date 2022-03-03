<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    const PAGINATION_NUMBER = 5;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    protected function findUser($id)
    {
        return $this->user->withoutGlobalScope('active')->findOrFail($id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->with('tasks')
            ->withoutGlobalScope('active')
            ->paginate(self::PAGINATION_NUMBER)
            ->withQueryString();

        return view('pages.user.user-table', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $request->flashOnly(['first_name', 'last_name', 'email', 'username']);

        try {
            DB::beginTransaction();

            $user = $this->user->create($request->except(['is_admin', 'is_active']));
            $user->is_admin = $request->input('is_admin');
            $user->is_active = $request->input('is_active');
            $user->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $user = $this->findUser($user);

        return view('pages.user.show-user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = $this->findUser($user);

        return view('pages.user.edit-user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $user)
    {
        $user = $this->findUser($user);

        try {
            DB::beginTransaction();

            $user->update($request->input());
            $user->is_admin = $request->input('is_admin');
            $user->is_active = $request->input('is_active');
            $user->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = $this->findUser($user);

        try {
            DB::beginTransaction();

            $user->tasks()->delete();
            $user->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }

        return redirect()->route('users.index');
    }
}
