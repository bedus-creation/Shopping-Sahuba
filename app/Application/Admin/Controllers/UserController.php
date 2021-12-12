<?php

namespace App\Application\Admin\Controllers;

use App\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Users\Models\User;

class UserController extends Controller
{
    protected $repository;

    public function __construct(User $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $users = User::all();

        return view("admin.users.index", compact("users"));
    }

    public function edit($id)
    {
        $user = $this->repository->findOrFail($id);

        return view("admin.users.edit", compact("user"));
    }

    public function update(Request $request, $id)
    {
        $user = $this->repository->findOrFail($id);

        $user->update($request->all());

        $user->createRole($request->roles);

        return redirect()->back()->with("success", "User Data has been Updated.");
    }
}
