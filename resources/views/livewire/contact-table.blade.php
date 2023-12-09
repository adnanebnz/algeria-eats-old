<div class="w-full h-max bg-slate-200 hover:bg-slate-300 rounded-lg p-2 text-xl my-2">
    <h1>Contact Tble</h1>
    <table class="w-full gap-y-3">
        <tr class="text-2xl">
            <td>nom</td>
            <td>prenom</td>
            <td> email</td>
            <td>message</td>
        </tr>
        @foreach ($contacts as $contact)
            <tr >
                <td>{{$contact->nom}}</td>
                <td>{{$contact->prenom}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->message}}</td>
            </tr>
        @endforeach
    </table>
</div>
