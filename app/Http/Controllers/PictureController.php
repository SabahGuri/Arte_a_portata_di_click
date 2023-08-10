<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Picture;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
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
        $categories=Category::all();
        return view('pictures.index',[
            
            'pictures'=>$pictures,
            'categories'=>$categories

        
        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories=Category::all();
        return view('pictures.create',[
            'categories'=>$categories
        ]);
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

        $categories=$request->categorie;//! qui salvo l'array delle categorie salvate dall'utente nel form
        $current_picture=Picture::find($picture->id);//!mi ricavo l'ultimo record di quadro aggiunto
        foreach($categories as $category){//!faccio il foreach dell'array di categorie
            
            $current_picture->categories()->attach($category);//! attraverso la funzione categories che si trova nel model Picture con la funzione attach vado a collegare il quadro con la categoria nella tabella category_picture 
        }

        return redirect()->route('pictures.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $picture=Picture::find($id);

        return view('pictures.show',['picture'=>$picture]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $picture=Picture::find($id);
        $categories=Category::all();

        //! if che serve a fermare gli utenti loggati a non modificare i quadri degi altri attraverso l'url
        if(auth()->user()->id==$picture->user_id){
            
            return view('pictures.edit',[
                'picture'=>$picture,
                'categories'=>$categories
            ]);
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
       
        //! if che serve a fermare gli utenti non loggati a non modificare i quadri degi altri attraverso l'url
        if(auth()->user()->id==$picture->user_id){
           

            
            if($request->file('immagine')){

                if($article->image_id!==""){
                    $imageId=$picture->image_id;
                }else{
                    $imageId=uniqid();
                }
                $imageName='picture-image-' . $imageId . '.jpg';
                $picture->image_id=$imageId;
                $picture->image=$imageName;
                $image=$request->file('immagine')->storeAs('public',$imageName);

               
            }
            $picture->save();

            //*prima devo eliminare tutte le categorie precedentemente selezionate dopo le aggiungp nell'altro ciclo
            $allCategories=Category::all();
            $current_picture=Picture::find($picture->id);//!mi ricavo l'ultimo record di quadro aggiunto
            foreach($allCategories as $singleCategory ){
                $current_picture->categories()->detach($singleCategory->id);//! attraverso la funzione categories che si trova nel model Picture con la funzione attach vado a collegare il quadro con la categoria nella tabella category_picture 

            }


            //* ciclo per aggiungere le nuove categorie
            $categories=$request->categorie;//! qui salvo l'array delle categorie salvate dall'utente nel form
           
            foreach($categories as $category){//!faccio il foreach dell'array di categorie
            
            $current_picture->categories()->attach($category);//! attraverso la funzione categories che si trova nel model Picture con la funzione attach vado a collegare il quadro con la categoria nella tabella category_picture 
            }

            return redirect()->route('pictures.index');
        }else{
            return redirect()->route('home.index');
        }    
        
        
        
            

        
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
        $add_costumer=(new CostumerController)->store($request);//!qui viene passato l'id del costumer  grazie al return fatto nel CostumerController

        $add_order=(new OrderController)->store($request,$add_costumer);

        return $add_order;
    }
}
