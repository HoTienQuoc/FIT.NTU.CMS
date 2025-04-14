<?php

use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function addOrUpdate()
    {
        return view("admin.users.addOrUpdate");
    }
    public function edit()
    {
        return view("admin.users.edit");
    }
    public function delete()
    {
        return view("admin.users.delete");
    }
}
