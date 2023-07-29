<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item=Item::all();
        return view('items.index',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
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
            'item_name' => 'required',
            'item_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $data= new Item();

        if($request->file('item_image')){
            $file= $request->file('item_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('assets/Image'), $filename);

            $data['item_image']= $filename;
            $data['item_name']=$request->get('item_name');
        }
        $data->save();
        return redirect()->route('items.index')->with('success','Added Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        // $request->validate(['item_name' => 'required','item_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        $update = ['item_name' => $request->item_name ];

        if ($files = $request->file('item_image')) {
            $destinationPath = public_path('assets/Image/');// upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $update['item_image'] = "$profileImage";
        }
        $update['item_name'] = $request->get('item_name');
        
        Item::where('id',$item->id)->update($update);

        return redirect()->route('items.index')->with('success','Updated Successfully!!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success','Deleted Successfully!!');
    }
}
