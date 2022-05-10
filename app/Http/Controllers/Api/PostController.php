<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recupero tutti i post dal db con categorie e tags
        $posts = Post::with(['category', 'tags'])
        ->where('publication_date', '!=', null)
        ->orderBy('publication_date', 'DESC')
        ->paginate(12);

        // Return response json posts
        return response()->json([
            'posts' => $posts,
            'success' => true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Recupero il singolo post con la categoria e i tags
        $post = Post::with('category', 'tags')->where('slug', $slug)->first();

        // Controllo se esiste il post
        if($post) {

            // Return response json posts succes true status 200
            return response()->json([
                'post' => $post,
                'success' => true
            ]);
        } else {

            // Return response json posts succes false status 404
            return response()->json([
                'message' => 'Post non trovato',
                'success' => false
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
