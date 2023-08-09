<x-layout>

    <!-- /resources/views/post/create.blade.php -->
 
 
    <x-form-errors/>
 
<!-- Create Post Form -->

<h2 class="text-center">Registrati al nostro portale</h2>
    <form action="/register" method="post">
        @csrf
        <label for="name">Nome Cognome</label><br>
        <input type="text" name="name" value="{{old('name')}}"><br>
        
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email" value="{{old('email')}}"><br>

        <label for="passsowrd">Password</label><br>
        <input type="password" name="password" id="password"><br>

        <label for="password_confirmation">Conferma password</label><br>
        <input type="password" name="password_confirmation" id="password_confirmation"><br>

        <button type="submit">Registrati</button>
        
    </form>
</x-layout>