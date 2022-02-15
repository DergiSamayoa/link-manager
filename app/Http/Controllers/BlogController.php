<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    function __construct()
    {
        $this->middleware(
            'permission:ver-blog|crear-blog|editar-blog|borrar-blog',
            ['only' =>  ['index']]
        );

        $this->middleware(
            'permission:crear-blog',
            ['only' =>  ['create','store']]
        );

        $this->middleware(
            'permission:editar-blog',
            ['only' =>  ['edit','update']]
        );

        $this->middleware(
            'permission:borrar-blog',
            ['only' =>  ['destroy']]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);        
        $permissions = $user->getAllPermissions();

        $blogs = Blog::paginate(5);

        return view('blogs.index', compact('blogs', 'user', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::user()->id);
        return view('blogs.crear', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'link' => 'required|url'
        ]);

        Blog::create($request->all());

        return redirect()->route('blogs.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $user = User::find(Auth::user()->id);
        return view('blogs.editar', compact('blog', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'link' => 'required|url'
        ]);

        $blog->update($request->all());

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index');
    }
}
