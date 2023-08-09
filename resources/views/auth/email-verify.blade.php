<x-layout>

    <p>Abbiamo mandato una mail di verica , clicca sul link per verificare la tua email.</p>

    
    <form action="/email/verification-notification" method="post">
        @csrf

        <input type="submit" value="Invia nuovamente la email">
    </form>
</x-layout>