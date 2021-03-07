<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use App\Special_feature;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class Special_featureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $special_features = Special_feature::all();
        
        return view('dashboard.special_features.index', compact('special_features'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Special_feature $special_feature)
    {
        return view('dashboard.special_features.edit', compact('special_feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Special_feature $special_feature)
    {
        $special_feature->name = $request->name;
        $special_feature->description = $request->description;
        $special_feature->start_at = $request->start_at;
        $special_feature->finished_at = $request->finished_at;
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $path = Storage::disk('s3')->put('/', $image, 'public'); // Ｓ３にアップ
            $special_feature->img = Storage::disk('s3')->url($path);
        }
        $special_feature->update();

        return redirect()->route('dashboard.special_features');
    }

}
