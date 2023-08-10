<x-layout>

    <h1></h1>
    <div class="container">
        <div class="row">
              
   
      
        <div class=" col-12 col-md-4 my-3">
                    <img src="{{asset('storage/'. $picture->image)}}" class="img-fluid" alt="">
                    <h3>{{$picture->title}}</h3>
                    <p>{{$picture->description}} </p>
                    <p> €{{$picture->price}} </p>
                    <p>Venduto da:{{$picture->user->name}} </p>

                    {{-- mosto solo se l'utente è loggato --}}
                    @if (auth()->check())
                        {{--  questo if serve a verificare se il quadro  apprtiene alla persona loggata in modo tale che possa modificare soo il suo quadro --}}
                        @if (auth()->user()->id==$picture->user_id)
                            <a href="{{route('pictures.edit',$picture->id)}}">Modifica</a>
                    
                            <form action="{{route('pictures.destroy',$picture->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Elimina</button>
                            </form>

                        @else    
                        
                        @endif
                    @endif
                    <a href="{{route('pictures.check-out',[$picture->id])}}" class=""><button type="submit">Aquista</button></a>


                    
        </div>
    
        </div>
    </div>
</x-layout>