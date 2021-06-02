<?php

namespace App\Http\Controllers;

use App\ProviderType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Buglinjo\LaravelWebp\Facades\Webp;
class ProviderTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = ProviderType::all();
        return view('backend.category.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new ProviderType();
        $type->name = $request->name;
        $type->description = $request->description;
        $random = Str::random(40);
      $file = $request->file('image');     
      $filename = $file->getClientOriginalName();
      $avatar = explode('.',$filename);
      $avatar = $random.'.'.$file->extension();
      $fil= $file->move(public_path(), $avatar);
      $type->image = $avatar;
      if ($type->save()) {
          return redirect()->route('admin.categories');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProviderType  $providerType
     * @return \Illuminate\Http\Response
     */
    public function show(ProviderType $providerType)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProviderType  $providerType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProviderType $providerType)
    {
        return view('backend.category.edit',compact('providerType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProviderType  $providerType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProviderType $providerType)
    {
        $providerType->name  = $request->name;
        $providerType->description = $request->description;
        // dd("/public/".$providerType->image);
        if ($request->hasFile('image')) {

            if($providerType->image != null){
         
                $random = Str::random(40);
            $file = $request->file('image');     
            $filename = $file->getClientOriginalName();
            $avatar = explode('.',$filename);
            $avatar = $random.'.'.$file->extension();
            $fil= $file->move(public_path(), $avatar);
            $providerType->image = $avatar;
            }
            
        }
        if ($providerType->save()) {
            return redirect()->route('admin.categories');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProviderType  $providerType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProviderType $providerType)
    {
        if ($providerType->delete()) {
            
        }
        return redirect()->route('admin.categories');

    }
}
