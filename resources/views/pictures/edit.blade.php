<x-layout>
    @if (auth()->check())
    <h2>Modifica il quadro</h2>
    <form action="{{route('pictures.update',$picture->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- titolo --}}
        <label for="titolo">Titolo</label><br>
        <input type="text" name="titolo" id="titolo" value="{{$picture->title}}"><br>
        {{-- descrizione --}}
        <label for="descrizione">Descrizione</label><br>
        <textarea name="descrizione" id="descrizione" cols="30" rows="5">{{$picture->description}}</textarea><br>
        {{-- prezzo --}}
        <label for="prezzo">Prezzo</label><br>
        <input type="number" name="prezzo" id="prezzo" value="{{$picture->price}}"><br>
        {{-- immagine --}}
        <label for="immagine">Immagine</label><br>
        <input type="file" name="immagine" id="immagine">
        {{-- categorie --}}
        <label for="categorie">Categorie</label><br>
        <select name="categorie[]" id="categorie" multiple >
          @foreach ($categories as $category)

                                                {{-- abbiamo fatto un if inline per dire che se la categoria è stat gia impostata la deve selezionare altrimenti niente --}}
            <option value="{{$category->id}}" {{($picture->categories->contains($category->id)) ? 'selected':'' }}> {{$category->name}}</option>
          @endforeach
        </select>
        {{-- bottone submit --}}
        <button type="submit">Modifica</button>
    </form>



    @else
    
        <h2>QUESTA PAGINA E' VISIBILE SONO AGLI UTENTI LOGGATI <br>
            <a href="/register">REGISTRATI</a> OPPURE <a href="/login">ACCEDI</a>
        </h2>


    @endif
    

</x-layout>