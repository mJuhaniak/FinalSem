<?php

namespace App\Http\Controllers;

use Aginev\Datagrid\Datagrid;
use App\Models\Cabin;
use Illuminate\Http\Request;

class CabinController extends Controller
{
    public function index(Request $request) {
        $cabins = Cabin::paginate(10);
        $grid = new Datagrid($cabins, $request->get('f', []));

        $grid->setColumn('name', 'Názov chaty')
            ->setColumn('capacity', 'Kapacita')
            ->setColumn('info', 'Popis')
            ->setActionColumn([
                'wrapper' => function ($value, $row) {
                    return '<a href="' . route('cabin.edit', [$row->id]) . '" title="Edit" class="btn btn-sm btn-primary">Edit</a>
                <a href="' . route('cabin.delete', $row->id) . '" title="Delete" data-method="DELETE" class="btn btn-sm btn-danger" data-confrim="Are you sure?">Delete</a>';
                }
            ]);
        return view('cabin.index', ['grid' => $grid
        ]);
    }

    public function show() {
        $cabins = Cabin::all();
        return view('cabin', [
            'name' => 'Ubytovanie',
            'info' => 'textUbytovanie',
            'cabins' => $cabins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cabin.create', [
            'action' => route('cabin.store'),
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
            'name' => 'required|unique:cabins,name',
            'capacity' => 'required',
            'info' => 'required']);

        $cabin = Cabin::create($request->all());
        $cabin->save();
        return redirect()->route('cabin.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cabin $cabin
     * @return \Illuminate\Http\Response
     */
    public function edit(Cabin $cabin)
    {
        return view('cabin.edit', [
            'action' => route('cabin.update', $cabin->id),
            'method' => 'put',
            'model' => $cabin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Cabin $cabin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cabin $cabin)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required',
            'info' => 'required']);

        $cabin->update($request->all());
        return redirect()->route('cabin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cabin $cabin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cabin $cabin)
    {
        $cabin->delete();
        return redirect()->route('cabin.index');
    }
}
