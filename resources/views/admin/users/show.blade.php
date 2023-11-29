<x-dashboard-layout :isAdmin=true>
    <div class="bg-slate-100">
        <div class="py-4 ">
            <input 
            type="text" 
            name="serch" 
            placeholder="User id"
            class="w-1/3 h-12 rounded-lg p-6 ">
        </div>
        <div class="w-full h-full bg-slate-200">
            <table class=" w-full text-center text-xl">
                <tr class="text-3xl bg-blue-400">
                    <td>id</td>
                    <td>image</td>
                    <td>email</td>
                    <td>Delet</td>
                </tr>
                @foreach ($users as $user)
                    <tr 
                    class="bg-blue-200 hover:bg-blue-500 hover:text-white h-6 " 
                    >
                        <td>{{$user->id}}</td>
                        <td
                        onclick="window.location='{{ route('admin.indexOne', ['user' => $user]) }}'">
                            <img 
                            class="rounded-full w-20 h-20 mx-auto my-4 object-cover border border-solid border-gray-300"
                            src="{{ $user->image ? (str_starts_with($user->image, 'http') ? $user->image : asset('storage/' . $user->image)) : asset('assets/user.png') }}" />

                        </td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.destroy', ['user' => $user->id]) }}" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                @method('DELETE')
                            <button 
                            type="submit" 
                            class="bg-red-700 hover:bg-red-800 px-6 py-2 rounded-md  text-white">
                                Supprimer
                            </button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </table>
    
        </div>
    </div>
    
    <!--<div class="w-full h-full bg-slate-100">
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
    </div>-->
</x-dashboard-layout>
