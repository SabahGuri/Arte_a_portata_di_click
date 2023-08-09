<x-layout>
  <x-form-errors/>

    <h2>Aggiungi un nuovo quadro</h2>
    <form action="{{route('pictures.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- titolo --}}
        <label for="titolo">Titolo</label><br>
        <input type="text" name="titolo" id="titolo"><br>
        {{-- descrizione --}}
        <label for="descrizione">Descrizione</label><br>
        <textarea name="descrizione" id="descrizione" cols="30" rows="5"></textarea><br>
        {{-- prezzo --}}
        <label for="prezzo">Prezzo</label><br>
        <input type="number" name="prezzo" id="prezzo"><br>
        {{-- immagine --}}
        <label for="immagine">Immagine</label><br>
        <input type="file" name="immagine" id="immagine">
        {{-- bottone submit --}}
        <button type="submit">Aggiungi</button>
    </form>
</x-layout>