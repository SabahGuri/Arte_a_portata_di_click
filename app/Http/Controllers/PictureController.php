<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Picture;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Requests\StorePictureRequest;
use App\Http\Controllers\CostumerController;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pictures=Picture::all();

        return view('pictures.index',['pictures'=>$pictures]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pictures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePictureRequest $request)
    {

        
       

     
        $picture= new Picture;
        $picture->user_id=auth()->user()->id;
        $picture->title=$request->titolo;
        $picture->description=$request->descrizione;
        $picture->price=$request->prezzo;
        
        

        if($request->file('immagine')){
            $imageId=uniqid();
            $imageName='picture-image-' . $imageId . '.jpg';
            $picture->image=$imageName;
            $picture->image_id=$imageId;

        }else{
            $picture->image='';
            $picture->image_id='';
        }
        $image=$request->file('immagine')->storeAs('public',$imageName);
        
        $picture->save();

        return redirect()->route('pictures.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $picture=Picture::find($id);

        //! if che serve a fermare gli utenti loggati a non modificare i quadri degi altri attraverso l'url
        if(auth()->user()->id==$picture->user_id){
            
            return view('pictures.edit',['picture'=>$picture]);
        }else{
            return redirect()->route('pictures.index');
        }

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {   
        $picture=Picture::find($id);
        //! if che serve a fermare gli utenti loggati a non modificare i quadri degi altri attraverso l'url
        if(auth()->user()->id==$picture->user_id){
            $imageName='picture-image-' . $imageId . '.jpg';

            
            if($request->file('immagine')){

                if($article->image_id!==""){
                    $imageId=$picture->image_id;
                }else{
                    $imageId=uniqid();
                }
                $picture->image_id=$imageId;
                $picture->image=$imageName;
                $image=$request->file('immagine')->storeAs('public',$imageName);

               
            }
            $picture->save();
        }else{
            return redirect()->route('pictures.index');
        }        

            

        return redirect()->route('pictures.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $picture=Picture::find($id);
        $picture->delete();
        return redirect()->route('pictures.index');


    }


    //! funzione che ci fa vedere il ceckout per l'aquisto del quadro

    public function check_out($id){
        $picture=Picture::find($id);

        return view('pictures.check-out',['picture'=>$picture]);
    }

    //! lo store dell'ordine
    public function performCheckout(Request $request,$id){
        $add_costumer=(new CostumerController)->store($request);

        return $add_costumer;
    }
}
