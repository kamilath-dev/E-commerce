<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    protected $products;

    public function __construct()
    {
        $this->products = new Product();
    }

    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $products = $this->products->all();
        $categories = Category::pluck('name', 'id');

        return view('pages.product.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Valider les données de la requête
    $validatedData = $request->validate([
        'productname' => 'required|string|max:255',
        'cat_id' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Vérifier si un fichier a été téléchargé avec succès
    if ($request->hasFile('photo')) {
        // Générer un nom unique pour le fichier
        $fileName = time().$request->file('photo')->getClientOriginalName();
        // Déplacer le fichier téléchargé dans le répertoire public/images
        $request->file('photo')->move(public_path('images'), $fileName);
        // Enregistrer le produit avec le nom du fichier
        $validatedData['photo'] = $fileName;
    }

    // Créer un nouveau produit avec les données validées
    Product::create($validatedData);

    // Rediriger l'utilisateur vers la page précédente
    return redirect()->back();
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
