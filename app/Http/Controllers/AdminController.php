<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
/*
  public function __construct()
  {
    $this->middleware('auth');
    
    $this->middleware('admin');
    
  }
*/

  public function index()
  {
    return view("admin.dashboard",);
  }

  public function users(Request $request)
  {
    $query = User::select('id', 'nom', 'prenom', 'email', 'image', 'created_at');

    // Eager load relationships if we dont do this we are going to get 27 queries instead of 8
    $query->with(['consumer', 'deliveryMan', 'artisan', 'admin']);

    // Search by name or email
    if ($request->has('search')) {
      $search = $request->input('search');
      $query->where(function ($q) use ($search) {
        $q->where('nom', 'like', "%$search%")
          ->orWhere('prenom', 'like', "%$search%")
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
            $query->whereDoesntHave('admin')
              ->whereDoesntHave('artisan')
              ->whereDoesntHave('deliveryMan')
              ->whereHas('consumer');
            break;
        }
      }
    }

    $users = $query->paginate(10);

    return view("admin.users.index", ['users' => $users]);
  }

  public function showUser(User $user)
  {
    return view("admin.users.show", ['user' => $user]);
  }

  public function edit(User $user)
  {
    return view("admin.users.edit", ['user' => $user]);
  }

  public function update($request, User $user)
  {
    $data = $request->validate([
      'nom' => 'required|string',
      'prenom' => 'required|string',
      'num_telephone' => 'required|string',
      'adresse' => 'required|string',
      'email' => 'required|email|unique:users',
      'image' => 'nullable|image|max:4096',
      'password' => 'required|min:3|confirmed',
      'password_confirmation' => 'required|same:password',
    ]);

    $user->update($data);

    Alert::success("succes", "users modify!");

    return redirect()->route("admin.index");
  }

  public function destroy(User $user)
  {
    $user->delete();
    Alert::success('succes', "user is deleted ! ");
    return redirect()->route("admin.users");
  }

  public function user_products(User $user)
  {
    $userOrders = Order::where('user_id', $user->id)->get();
    $userProductsOrders = Product::where('id', $userOrders->product_id)->get();
    $userProducts = Product::where('artisan_id', $user->id)->get();
    $orderPercentage = $userProductsOrders->count() / $userProducts->count();
    return [$userOrders->count(), $userProducts->count(), $orderPercentage, $userProductsOrders->count()];
  }
}
