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
        // Prendo il risultato in ordine di creazione decrescente
        // with inserisco qui i campi delle relazioni in modo da avere nei post anche le categorie e tags
        // La paginazione mi inserisce 12 elementi per pagina
        $result = Post::orderBy('created_at','desc')->with('category','tags')->paginate(12);
        $success = true;
        // tornerà il risultato di result e success in json
        return response()->json(compact('result','success'));
          

       
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
        $post = Post::where('slug',$slug)->with('category','tags')->first();

        if($post) {

            return response()->json([
                'post' => $post,
                'success' => true
            ]);

        } else {
            return response()->json([
                'success' => false
            ],404);
        }

        
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
