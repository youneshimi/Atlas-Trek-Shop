<?php

namespace App\Http\Controllers;

use App\Models\Paniers;
use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function getCart()
    {
        $paniers = Paniers::where('user_id', Auth::id())->sum('quantite');
        $mycart =  Paniers::where('user_id', '=',  Auth::user()->id)->get();
        $produits = Produits::All();
        return view('/cart', [
            'mycart' => $mycart,
            'paniers' => $paniers,
            'produits' => $produits,

        ]);
    }

    // fonction statique affichage nombres articles dans le panier
    // utilisable dans toutes les vues en declarant @php  use \App\Http\Controllers\CartController; @endphp
    // et {{ CartController::MonPanier() }} pour afficher le resultat super pratique!

    public static function MonPanier()
    {
        if (Auth::check()) {
            return  $paniers = Paniers::where('user_id', Auth::id())->sum('quantite');
        } else {
            return  $paniers = null;
        }
    }

    public function addtoCart(Request $request, $id)
    {

        $Panier = Paniers::where('user_id', Auth::id())->where('prod_id', $id)->first();
        if ($Panier) {
            $Panier = Paniers::where('user_id', Auth::id())->where('prod_id', $id);
            $Panier->increment('quantite', $request->quantite);
        } else {
            $Panier = new Paniers();
            $Panier->user_id = Auth::user()->id;
            $Panier->prod_id = $id;
            $Panier->quantite = $request->quantite;
            $Panier->save();
        }

        return redirect()->back()->with('cart_ok', 'ok');
    }

    public function deletefromCart($id)
    {

        $Panier = Paniers::where('user_id', Auth::id())->where('prod_id', $id)->first();
        if ($Panier->quantite == 1) {
            $Panier->where('prod_id', $id)->delete();
        } else {
            $Panier->where('prod_id', $id)->decrement('quantite');
        }
        return redirect()->back()->with('cart_delete', 'ok');
    }
}
