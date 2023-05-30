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
            'books' => $books,
            'jan' => BookKeeping::whereMonth('date', '1')->sum('cost'),
            'feb' => BookKeeping::whereMonth('date', '2')->sum('cost'),
            'mar' => BookKeeping::whereMonth('date', '3')->sum('cost'),
            'apr' => BookKeeping::whereMonth('date', '4')->sum('cost'),
            'mei' => BookKeeping::whereMonth('date', '5')->sum('cost'),
            'jun' => BookKeeping::whereMonth('date', '6')->sum('cost'),
            'jul' => BookKeeping::whereMonth('date', '7')->sum('cost'),
            'aug' => BookKeeping::whereMonth('date', '8')->sum('cost'),
            'sep' => BookKeeping::whereMonth('date', '9')->sum('cost'),
            'oct' => BookKeeping::whereMonth('date', '10')->sum('cost'),
            'nov' => BookKeeping::whereMonth('date', '11')->sum('cost'),
            'dec' => BookKeeping::whereMonth('date', '12')->sum('cost'),
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
