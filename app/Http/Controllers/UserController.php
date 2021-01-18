<?php

namespace App\Http\Controllers;

use Aginev\Datagrid\Datagrid;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(\App\Models\User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = \App\Models\User::paginate(25);
        $grid = new Datagrid($users, $request->get('f', []));

        $grid->setColumn('name',  'Full name')
            ->setColumn('email', 'Email address')
            ->setActionColumn([
            'wrapper' => function ($value, $row) {
                return '<a href="' . route('user.edit', [$row->id]) . '" title="Edit" class="btn btn-sm btn-primary">Edit</a>
                <a href="' . route('user.delete', $row->id) . '" title="Delete" data-method="DELETE" class="btn btn-sm btn-danger" data-confrim="Are you sure?">Delete</a>';
            }
            ]);
        return view('user.index', ['grid' => $grid
        ]);
    }

    public function profile() {
        $user = Auth::user();
        $user->password = '';
        return view('user.profile.index', [
            'action' => route('user.update', $user->id),
            'method' => 'put',
            'model' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create', [
            'action' => route('user.store'),
            'method' => 'post'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|min:6|confirmed']);

        $user = \App\Models\User::create($request->all());
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Models\User $user)
    {
        $user->password = '';
        return view('user.edit', [
            'action' => route('user.update', $user->id),
            'method' => 'put',
            'model' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Models\User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|min:6|confirmed']);

        $user->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Models\User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
