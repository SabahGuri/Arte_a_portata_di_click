
<x-layout>

    <x-form-errors/>
    <h2>Acquista : {{$picture->title}}</h2>

    <form action="{{route('pictures.performCheckout',[$picture->id])}}" method="post">
        @csrf
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" id="nome"><br>
        <label for="cognome">Cognome</label><br>
        <input type="text" name="cognome" id="cognome"><br>    
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br>    
        <label for="indirizzi_fatturazione">Indirizzo fatturazione</label><br>
        <input type="text" name="indirizzo_fatturazione" id="indirizzi_fatturazione"><br>    
        <label for="indirizzo_spedizione">Indirizzo spedizioe</label><br>
        <input type="text" name="indirizzo_spedizione" id="indirizzo_spedizione"><br>    
        <label for="cap">CAP</label><br>
        <input type="text" name="cap" id="cap"><br> 
        <label for="telefono">Numero cellulare</label><br>  
        <input type="text" name="telefono" id="telefono"><br>
        <label for="citta">Città</label><br>
        <input type="text" name="citta" id="citta"><br>  
        
        <button type="submit">Aquista</button>
        
    </form>
</x-layout>