<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KategoriController extends Controller
{
    /**
     * Show the form to create a new post.
     */
    public function create(): View
    {
        return view('kategori.create');
    }

    /**
     * Store a new post.
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        // The incoming request is valid...
    
        // Retrieve the validated input data...
        $validated = $request->validated();
    
        // Retrieve a portion of the validated input data...
        $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);
        $validated = $request->safe()->except(['kategori_kode', 'kategori_nama']);
    
        // Store the post...
    
        return redirect('./kategori');
    }
}
