<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Area;
use App\Models\User;
use App\Models\PNF;
use App\Services\Input;
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
        // TODO -> añadir mostrar el rol y el filtro por rol
        $filters = Input::getFilters();
        $search = $request->input('search');
        $sortColumn = $request->input('sort');
        
        $users = User::filters($filters)
            ->search($search)
            ->sort($sortColumn)
            ->paginate(10)
            ->withQueryString();

        return view('users.index', [
            'users' => $users,
            'filters' => $filters,
            'sort' => $sortColumn,
            'search' => $search,
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::getOptions();
        $pnfs = PNF::getOptions();

        return view('users.create', [
            'areas' => $areas,
            'pnfs' => $pnfs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        if (Input::checkFile('image')) {
            $data['image'] = Input::storeFile('image', 'public/profiles');
        }

        User::create($data);

        return redirect()->route('users.index')
            ->withSuccess('El usuario se ha añadido con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',[
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $areas = Area::getOptions();
        $pnfs = PNF::getOptions();

        return view('users.edit', [
            'user' => $user,
            'areas' => $areas,
            'pnfs' => $pnfs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);

        return redirect()->route('users.index')
            ->withWarning('El usuario se ha editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withDanger('El usuario se ha eliminado con exito');
    }
}
