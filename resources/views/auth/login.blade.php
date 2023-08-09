<x-layout>
    <h1 class="text-center">Accedi al nostro portale</h1>
    <x-form-errors/>
    <form action="/login" method="post">
        @csrf
       
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email"><br>

        <label for="passsowrd">Password</label><br>
        <input type="password" name="password" id="password"><br>
        <button type="submit">Accedi</button>
    </form>
</x-layout>