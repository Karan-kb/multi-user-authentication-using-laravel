<?php

namespace App\Http\Controllers;

use id;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){

            $usertype=Auth()->user()->usertype;

            if($usertype=='user'){
                return view('dashboard');
            }
            else if($usertype=='admin'){
                return view('admin.adminhome');

            }else{
                return redirect()->back();
            }
        }

    }

   

   public function adminhome(User $user, Wallet $wallet)
    {
        $users = User::all();
        $wallets = DB::select("SELECT * FROM wallets");
        
        return view('admin.adminhome', compact('users','wallets'));
    }
    public function edit(User $user)
    {
        $id = $user->id;
        $query = "SELECT * FROM users WHERE id = ?";
        $user = DB::select($query, [$id])[0];
    
        return view('admin.edit', compact('user'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    $user->update($request->all());

    return redirect()->route('admin.adminhome')->with('message', 'User updated successfully.');
}

    

    public function destroy(User $user)
{
    $id = $user->id;
    $query = "DELETE FROM users WHERE id = ?";
    DB::delete($query, [$id]);

    return redirect()->route('admin.adminhome')->with('message', 'User deleted successfully.');
}

}
