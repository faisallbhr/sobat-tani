<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\BookKeeping;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BookKeepingController extends Controller
{
    public function __construct() {
        $this->middleware('can:petani');
    }
    public function index(){
        $books = BookKeeping::where('user_id', auth()->user()->id)->latest()->paginate(7);
        return view('petani.pembukuan.index', [
            'books' => $books
        ]);
    }
    public function create(){
        return view('petani.pembukuan.create', [
            'categories' => Category::all()
        ]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'activity' => 'required|max:50',
            'cost' => 'required|numeric',
            'date' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = SlugService::createSlug(BookKeeping::class, 'slug', $request->activity); 

        BookKeeping::create($validatedData);
        return redirect('petani/books');
    }
    public function edit(BookKeeping $book){
        return view('petani.pembukuan.edit', [
            'book' => $book
        ]);
    }
    public function update(Request $request, BookKeeping $book){
        $validatedData = $request->validate([
            'activity' => 'required|max:50',
            'cost' => 'required|numeric',
            'date' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = SlugService::createSlug(BookKeeping::class, 'slug', $request->activity); 

        BookKeeping::where('id', $book->id)->update($validatedData);
        
        return redirect('/petani/books')->with('status', 'Berhasil mengubah catatan!');
    }
}
