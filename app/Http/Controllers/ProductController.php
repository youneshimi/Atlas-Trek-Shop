<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Paniers;
use App\Models\Comments;
use App\Models\Produits;
use App\Models\produits_categories;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Util\Percentage;

class ProductController extends Controller

{
    public function getProduct(Request $request)
    {
        $produits = Produits::where('actif', '=', 1);
        $q = request()->input('q');
        if ($request->filled('q')) {
            $produits->where('titre', 'like', '%' . $q . '%');
        }
        if ($request->filled('note')) {
            $note = $request->note;
            $produits->where('note', '>=', $note);
        }
        if ($request->filled('categories')) {
            $categories = $request->categories;
            $produits->whereHas('produit_categorie', function ($q) use ($categories) {

                $q->where('categorie_id', '=', $categories);
            });
        }
        if ($request->filled('prix')) {

            $prix = $request->prix;
            $produits->where('prix', '<=', $prix);
        }
        $categories = Categories::all();

        return view('index', [
            'produits' => $produits->paginate(8),  //a la place d'un get me demande pas pourquoi!
            'categories' => $categories,
            'q' => $q,
        ]);
    }

    public function getOneProduct($id)
    {
        $timer = Carbon::now();
        $produit = Produits::find($id);
        $note = Comments::where('product_id', '=', $id)->avg('note');
        $notearrondi = (floor($note * 2) / 2);
        $comments = Comments::where('product_id', $id)->inRandomOrder()->limit(2)->get();
        $noteProduct = self::getStars($id);
        return view('card', [
            'produit' => $produit,
            'comments' => $comments,
            'timer' => $timer,
            'note' => $note,
            'notearrondi' => $notearrondi,
            'noteProduct' => $noteProduct,
        ]);
    }

    public function getAllProducts()
    {
        $cards = Produits::paginate(8);
        $categories = Categories::all();

        return view('giftCards', [
            'cards' => $cards,
            'categories' => $categories

        ]);
    }


    public function activeur(Request $request, $id)
    {
        $card = Produits::find($id);
        if ($request->active) {
            $card->actif = 1;
        } else if ($request->desactive) {

            $card->actif = 0;
        }
        $card->update();
        return redirect()->back();
    }

    public function addProduct(Request $request)
    {
        if ($request->hasFile('images')) {
            $path = Storage::disk('public')->put('img', $request->file('images'));
        }
        $card = new Produits();
        $card->titre =  $request->titre;
        $card->note = $request->note;
        $card->description = $request->description;
        $card->prix = $request->prix;
        $card->image = '/storage/' . $path;
        $card->save();
        $card->categorie()->attach($request->categories);
        return redirect()->back();
    }

    public function updateProduct(Request $request, $id)
    {
        $cards = Produits::where('id', '=', $id)->get();
        $cards = Produits::find($id);
        $cards->titre = $request->titre;
        $cards->note = $request->note;
        $cards->description = $request->description;
        $cards->prix = $request->prix;
        if ($request->hasFile('images')) {
            $cards->image = '/storage/' . Storage::disk('public')->put('img', $request->file('images'));
        } else {
            $cards->image = $cards->image;
        }
        $cards->categorie()->sync($request->categories);
        $cards->update();

        return redirect()->back();
    }

    public function deleteCard($id)
    {
        $delete = Produits::find($id);
        $delete->delete();
        return redirect()->back();
    }

    private function getStars($noteProduct)
    {
        $note = Comments::where('product_id', '=', $noteProduct)->avg('note');

        $noteProduct = Comments::groupBy('note')
            ->select('note', Comments::raw('count(*) as total'))
            ->where('product_id', '=', $noteProduct)
            ->get();
        $res = array(
            'note' =>  [],
            'prct' => [],
            'total' => 0,
            'average' => 0
        );


        $average = 0;

        // calcul du nombre de note total + nombre de note par etoile
        for ($i = 5; $i > 0; $i--) {
            foreach ($noteProduct as $note) {
                if ($note->note == $i) {
                    $res['note'][$i] = $note->total;
                    $res['total'] += $note->total;
                    $average += $note->total * $i;
                    break;
                }
            }
            if (!isset($res['note'][$i])) {
                $res['note'][$i] = 0;
            }
        }
        // calcul du pourcentage de chaque note
        for ($i = 5; $i > 0; $i--) {
            if ($res['note'][$i] == 0) {
                $res['prct'][$i] = 0;
            } else {
                $res['prct'][$i] = round(($res['note'][$i] / $res['total']) * 100, 2);
            }
        }

        // calcul de la moyenne globale
        if ($res['total'] > 0) {
            $res['average'] = round($average / $res['total'], 1);
        } else {
            $res['average']  = 0;
        }

        return $res;
    }

    public function addComm(Request $request, $id)
    {

        $comm = new Comments();
        $produit = Produits::where('id', '=', $id)->get();
        $produit = Produits::find($id);
        $produit->note = ($request->noteavg + $request->note) / 2;
        $comm->contenu = $request->contenu;
        $comm->user_id = Auth::user()->id;
        $comm->product_id = $id;
        $comm->note = $request->note;

        $comm->save();
        $produit->update();
        return redirect()->route('getCard', ['id' => $id]);
    }


    public function deleteComm($id)
    {
        $delete = Comments::find($id);
        $delete->delete();
        return redirect()->back();
    }
}
