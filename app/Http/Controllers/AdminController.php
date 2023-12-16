<?php

namespace App\Http\Controllers;

use AnouarTouati\AlgerianCitiesLaravel\Facades\AlgerianCitiesFacade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function users(Request $request)
    {
        $query = User::select(
            'id',
            'nom',
            'prenom',
            'email',
            'image',
            'created_at'
        );

        $query->with(['consumer', 'deliveryMan', 'artisan', 'admin']);

        // Search by name or email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', "%$search%")
                    ->orWhere('prenom', 'like', "%$search%")
                    ->orWhereRaw("concat(nom, ' ', prenom) like '%$search%'")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        // Filter by role
        if ($request->has('role')) {
            $role = $request->input('role');

            if ($role != 'Tous') {
                switch ($role) {
                    case 'Admins':
                        $query->whereHas('admin');
                        break;
                    case 'Artisans':
                        $query->whereHas('artisan');
                        break;
                    case 'Livreurs':
                        $query->whereHas('deliveryMan');
                        break;
                    case 'Clients':
                        $query
                            ->whereDoesntHave('admin')
                            ->whereDoesntHave('artisan')
                            ->whereDoesntHave('deliveryMan')
                            ->whereHas('consumer');
                        break;
                }
            }
        }

        $users = $query->paginate(10);

        return view('admin.users.index', ['users' => $users]);
    }

    public function showUser(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        $wilayas = AlgerianCitiesFacade::getAllWilayas();

        return view('admin.users.edit', [
            'user' => $user,
            'wilayas' => $wilayas,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'num_telephone' => 'required|string',
            'adresse' => 'required|string|max:255',
            'wilaya' => 'required|string|max:255',
            'password' => 'nullable|string',
        ]);

        $user->update([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'num_telephone' => $data['num_telephone'],
            'adresse' => $data['adresse'],
            'wilaya' => $data['wilaya'],
        ]);

        // Update artisan-specific fields
        if ($user->artisan) {
            $speceficData = $request->validate([
                'heure_ouverture' => 'required|string',
                'heure_fermeture' => 'required|string',
                'desc_entreprise' => 'required|string',
                'type_service' => 'required|string',
            ]);

            $user->artisan->update($speceficData);
        }

        // Update deliveryman-specific fields
        if ($user->deliveryMan) {
            $speceficData = $request->validate([
                'est_disponible' => 'required|integer|in:1,0',
            ]);

            $user->deliveryMan->update($speceficData);
        }

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
        }

        if ($request->hasFile('image')) {
            if ($user->image) {
                // THE IMAGE IS IN public disk in profile_images folder
                Storage::disk('public')->delete($user->image);
            }
            $image = $request->file('image');
            $imagePath = $image->store('profile_images', 'public');
            $user->update(['image' => $imagePath]);
        }

        Alert::success('succes', 'Utilisateur modifié !');

        return redirect()->route('admin.users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('succes', 'Utilisateur supprimé !');

        return redirect()->route('admin.users');
    }
}
