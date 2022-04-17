<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('search');
        if($search)
        {
            $item = Item::where('name', 'LIKE', "%{$search}%")->paginate();
        } else {
            $item = Item::paginate();
        }
        
        Item::all();
        return view('item.index')
            ->with('category', Category::all())
            ->with('item', $item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('item.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
        ],
        [
            'name.required' => 'Name can\'t be empty!',
            'price.required' => 'Price can\'t be empty!',
            'description.required' => 'Description can\'t be empty!',
            'thumbnail.required' => 'Thumbnail can\'t be empty!',
        ]);

        $fileName = time().'.'.$request->thumbnail->extension();  

        $item = new Item;

        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->thumbnail = $fileName;

        $item->save();

        $item->category()->attach($request->category);
        
        $request->thumbnail->move(public_path('images'), $fileName);

        return redirect('/item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findorfail($id);
        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $item = Item::findorfail($id);
        return view('item.edit', compact('item', 'category'));
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
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg',
        ]);

        $item = Item::findorfail($id); 
        if($request->has('thumbnail'))
        {
            $path = "images/";
            File::delete($path . $item->thumbnail);
            $fileName = time().'.'.$request->thumbnail->extension();  
            $request->thumbnail->move(public_path('images'), $fileName);

            $item_data = [
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'thumbnail' => $fileName,
            ];

        } else {
            $item_data = [
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
             ];
        }
        
        $item->category()->sync($request->category);

        $item->update($item_data);

        return redirect('/item');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findorfail($id);

        $path = "images/";
        File::delete($path . $item->thumbnail);
        $item->delete();

        return redirect('/item') ;
    }
}
