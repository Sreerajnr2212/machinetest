<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with('department', 'designation')->get();
        return view('users', ['users'=>$users]);
    }
    
    public function search(Request $request)
    {
        $searchText = $request->input('search');

        $users = User::query()
            ->whereHas('department', function ($query) use ($searchText) {
                $query->where('name', 'like', '%' . $searchText . '%');
            })
            ->orWhereHas('designation', function ($query) use ($searchText) {
                $query->where('name', 'like', '%' . $searchText . '%');
            })
            ->orWhere('name', 'like', '%' . $searchText . '%')
            ->with('department', 'designation')
            ->get();

        return $users;
    }
}
