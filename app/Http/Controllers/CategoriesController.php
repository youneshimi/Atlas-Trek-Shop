<?php

namespace App\Http\Controllers;

use App\Models\Paniers;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{

    public function getCateg()
    {
        $categories = Categories::paginate(10);
        return view('categories', [
            'categories' => $categories,
        ]);
    }
    public static function categorie($id)
    {
        $categories = Categories::find($id);
        return view('index', [
            'categories' => $categories,
        ]);
    }

    public function addCateg(Request $request)
    {

        $validate = $request->validate([
            'label' => 'required',
        ]);
        $categorie = new Categories();
        $categorie->label = $validate['label'];
        $categorie->save();
        return redirect()->route('categories');
    }


    public function update(Request $request, $id_cat)

    {
        $categorie = Categories::find($id_cat);
        $categorie->label = $request->label;
        $categorie->save();
        return redirect()->route('categories');
    }
}
