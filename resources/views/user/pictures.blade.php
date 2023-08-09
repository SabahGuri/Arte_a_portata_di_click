<x-layout>
    <h1>Tutti i miei quadri</h1>

    @foreach ($user_pictures as $picture)
    <div class=" col-12 col-md-4 my-3">
        
        <img src="{{asset('storage/'. $picture->image)}}" class="img-fluid" alt="">
        <h3>{{$picture->title}}</h3>
        <p>{{$picture->description}} </p>
        <p> €{{$picture->price}} </p>
        <a href="{{route('pictures.edit',$picture->id)}}">Modifica</a>
    
        <form action="{{route('pictures.destroy',$picture->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Elimina</button>
        </form>
    

    @endforeach
</x-layout>