<?php

namespace App\Http\Controllers;

use Aginev\Datagrid\Datagrid;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
