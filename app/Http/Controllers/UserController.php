<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Contants\Roles;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:user-view|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('roles')->get();
        $currentUser = Auth::user();
        return view('user.index', compact('user','currentUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userRole = Auth::user()->roles[0]->name;
        if ($userRole !== Roles::ADMIN) {
            $roles = Role::whereNotIn('name', ['ADMIN'])->get();
        } else {
            $roles = Role::all()->pluck('name');
        }
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'name' => 'required',
        ]);

        try {
            DB::beginTransaction();
            // dd($validated);
            $validated['password'] = bcrypt(Str::random(20));
            // dd($validated);
            $user = User::create($validated);
            $user->assignRole($request->role);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            if (env('APP_ENV') !== 'production') {
                throw $th;
            }
            return redirect()->route('users.create')->withErrors('Something went wrong with the server')->withInput();
        }
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('user.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required',
            'name' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $request->only(['role', 'name', 'status']);
            $data = $request->all();
            $user->assignRole($request->role);
            $user = $user->update($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            if (env('APP_ENV') !== 'production') {
                throw $th;
            }
            return redirect()->route('users.edit')->withErrors('Something went wrong with the server')->withInput();
        }
        return redirect()->route('users.index')->with('success', 'User update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
