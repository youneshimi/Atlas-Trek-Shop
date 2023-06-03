<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paniers;
use App\Models\Comments;
use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UsersController extends Controller
{
    public function getUsers()
    {

        $users = User::paginate(10);
        return view('users', [
            'users' => $users,

        ]);
    }


    public function activisor(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->actif) {
            $user->actif = 1;
        } else if ($request->desactif) {
            $user->actif = 0;
        }
        $user->update();
        return redirect()->route('getUsers');
    }

    public function updateProfil(Request $request, $id)
    {
        $users = User::where('id', '=', $id)->get();
        $users = User::find($id);
        if ($request->file('photo') != null) {
            $img = Storage::disk('public')->put('img', $request->file('photo'));
            $path = '/storage/' . $img;
        } elseif ($request->file('photo') == null) {
            $path = $users->photo;
        } else {
            $path = 'img/avatar.png';
        }


        $users->nom = $request['nom'];
        $users->prenom = $request['prenom'];
        $users->username = $request['username'];
        $users->address = $request['address'];
        $users->numero_telephone = $request['phone'];
        $users->city = $request['city'];
        $users->country = $request['country'];
        $users->zipCode = $request['zip'];
        $users->photo = $path;
        if ($request->filled('role')) {
            $users->profil = $request['role'];
        } else {
            $users->profil = $users->profil;
        }
        $users->update();
        return redirect()->back();
    }

    public function profil()
    {
        return view('account', []);
    }

    public function userprofil($id)
    {
        $comments = Comments::where('user_id', '=', $id)->limit(3)->get();
        $produits = Produits::all();
        $user = User::where('id', '=', $id)->get();
        $user = User::find($id);

        return view('userAccount', [
            'produits' => $produits,
            'comments' => $comments,
            'user' => $user,

        ]);
    }

    public function Allusers()
    {
        return view('account', []);
    }

    public function showUsers($id)
    {
        $users = User::find($id);
        return view('user', [
            'users' => $users,
        ]);
    }
}
