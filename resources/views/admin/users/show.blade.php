<x-dashboard-layout :isAdmin=true>
    <div class="w-full h-full bg-slate-100">
        <table class="gap-y-8">
            <tr>
                <th>nom</th>
                <th>prénom</th>
                <th>adresse</th>
                <th>wilaya</th>
                <th>telephone</th>
                <th>email</th>
                <th>options</th>
            </tr>
            @foreach($users as $user)
            <tr class="text-center hover:bg-slate-300 h-12 gap-3">
                <td>{{$user->name}}</td>
                <td>{{$user->prename}}</td>
                <td>{{$user->adresse}}</td>
                <td>{{$user->wilaya}}</td>
                <td>{{$user->num_telephone}}</td>
                <td>{{$user->email}}</td>
                <td class="flex flex-col gap-3">
                    <button class="bg-blue-700 hover:bg-blue-800 px-6 py-2 rounded-md mt-4 text-white">
                        <a href="{{ route('admin.edit', ['user' => $user->id]) }}">Edit</a>
                    </button>
                    <button class="bg-green-700  text-white w-32 px-6 py-2 rounded-md mt-4 hover:bg-green-800">
                        <a href="{{ route('admin.indexOne', ['user' => $user->id]) }}">show</a>
                    </button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-dashboard-layout>
