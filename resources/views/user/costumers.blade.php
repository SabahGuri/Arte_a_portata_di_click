<x-layout>
    <h1 class="text-center ">I miei clienti</h1>
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($user_costumers as $user_costumer)
                <div class="col-12 col-md-3">
                    <p>Nome Cognome: {{$user_costumer->first_name}} {{$user_costumer->last_name}} </p> 
                    <p>Email : {{$user_costumer->email}} </p>
                    <p>Indirizzo fatturazione : {{$user_costumer->billing_adress}} </p>
                    <p>Indirizzo spedizione : {{$user_costumer->shipping_adress}} </p>
                    <p>CAP: {{$user_costumer->zip_code}} </p>
                    <p>Città : {{$user_costumer->city}} </p>
                    <p>Telefono: {{$user_costumer->phone_nr}} </p>
                </div>
     
            @endforeach
        </div>
    </div>
</x-layout>