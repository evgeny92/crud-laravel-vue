<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return Item::orderBy('created_at', 'desc')->get();
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
     * @param Request $request
     * @return Item
     */
    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item['name'];
        $newItem->save();

        return $newItem;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $existingItem = Item::find($id);
        if($existingItem){
            $existingItem->completed = $request->item['completed'] ? true : false;
            $existingItem->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $existingItem->save();

            return $existingItem;
        }

        return 'Item not found';
    }

    /**
     * @param $id
     * @return string
     */
    public function destroy($id)
    {
        $existingItem = Item::find($id);
        if($existingItem){
            $existingItem->delete();
            return 'Item successfully deleted';
        }

        return 'Item not found';
    }
}
