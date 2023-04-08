<?php


namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\DataFeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

    class DashboardController extends Controller
    {

        /**
         * Displays the dashboard screen
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function index()
        {
            return view('pages.dashboard.dashboard', [
                'posts' => Post::where('user_id', auth()->user()->id)->paginate(7)
            ]);
        }

        public function create()
        {
            return view('#', [
                'categories' => Category::all()
            ]);
        }
    
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'slug' => 'required|unique:posts',
                'category_id' => 'required',
                'body' => 'required'
            ]);
    
            $validatedData['user_id'] = auth()->user()->id;
    
            Post::create($validatedData);
    
            return redirect('/petani/posts');
      
        }
    
        /**
         * Display the specified resource.
         */
        public function show(Post $post)
        {
            return view('#', [
                'post' => $post
            ]);
        }
    
        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Post $post)
        {
            return view('#', [
                'post' => $post,
                'categories' => Category::all()
            ]);
        }
    
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Post $post)
        {
            $rules = [
                'title' => 'required|max:255',
                'category_id' => 'required',
                'body' => 'required'
            ];
    
            if($request->slug != $post->slug){
                $rules['slug'] = 'required|unique:posts';
            }
    
            $validatedData = $request->validate($rules);
    
            $validatedData['user_id'] = auth()->user()->id;
    
            Post::where('id', $post->id)
                ->update($validatedData);
    
            return redirect('/petani/posts');
        }
    
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Post $post)
        {
            Post::destroy($post->id);
    
            return redirect('/petani/posts');
    
        }
    }
