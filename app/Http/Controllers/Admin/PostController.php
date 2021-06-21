<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = Carbon::now()->format('Y-m-d');   
        return view('admin.posts.create', compact('now'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDAZIONE
        $request->validate([
            'title' => 'required|unique:posts|max:10',
            'content' => 'required',
            // 'pubblication_date' => 'required',
        ],[
            // Messaggi errori personalizzati       :attribute prende il valore
            'required' => 'Il :attribute è obbligatorio!!',
            'unique' => 'il :attribute è già presente!!',
            'max' => 'Max :max carratteri per il :attribute',
        ]);



        $data = $request->all();

        $data['pubblication_date'] = Carbon::now();
        // Generaz slug
        $data['slug'] = Str::slug($data['title'],'-');

        // Creaazione e salvataggio in db
            // Nuova istanza
            $new_post = new Post();

            // Popolo
            $new_post->fill($data); // Fillable

            // Salvataggio
            $new_post->save();

            return redirect()->route('admin.posts.show', $new_post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if(! $post){
            abort(404);
        }

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // $data['pubblication_date'] = Carbon::now();

        // $now = Carbon::now();


        $post = Post::find($id);

        if(! $post){
            abort(404);
        }

        return view('admin.posts.edit', compact('post'));


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
        //VALIDAZIONE
        $request->validate([
            'title' => [
                'required',
                Rule::unique('posts')->ignore($id),
                'max:10',
            ],
            'content' => 'required',
            // 'pubblication_date' => 'required',
        ],[
            // Messaggi errori personalizzati       :attribute prende il valore
            'required' => 'Il :attribute è obbligatorio!!',
            'unique' => 'il :attribute è già presente!!',
            'max' => 'Max :max carratteri per il :attribute',
        ]);



        $data = $request->all();

        $data['pubblication_date'] = Carbon::now();

        $post = Post::find($id);

        // Generazione slug e verifica se titolo è cambiato
        if($data['title'] != $post->title){
            $data['slug'] = Str::slug($data['title'], '-');
        }

        $post->update($data); //Fillable

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', $post->title);      //  WITH SERVE PER RITORNARE UN MESSAGGIO
    }
}
