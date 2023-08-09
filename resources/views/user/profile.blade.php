<x-layout>
    <h1>Profilo utente</h1>
    <h2>{{$users->name}}</h2>


    {{-- form per la modifica dei dati utente --}}
    <h3>Modifica nome ed email</h3>
    <form action="/user/profile-information" method="post">
        @csrf
        @method('PUT')

        <label for="name">Nome</label><br>
        <input type="text" name="name" id="name" value="{{auth()->user()->name}}"><br>
        <label for="email">Nome</label><br>
        <input type="email" name="email" id="email" value="{{$users->email}}"><br>
        <button type="submit">modifica</button>
    </form>


    <h3>Modifica la password</h3>
    <form action="/user/password" method="post">
        @csrf
        @method('PUT')
        <label for="current_password">Password attuale</label><br>
        <input type="password" name="current_password" id="current_password"><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br>

        <label for="password-confirmation">Conferma password</label><br>
        <input type="password" name="password_confirmation" id="password_confirmation"><br>
        <button type="submit">Modifica</button>

    </form>
</x-layout>