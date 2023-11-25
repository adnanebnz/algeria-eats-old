<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
  

  public function index()
  {
    return view("admin.dashboard");
  }
  public function users(){
    $users=User::all();
    return view("admin.users.show",['users'=>$users]);
  }
  public function indexOne(User $user){
    return view("admin.users.indexOne",['user'=>$user]);

  }
  public function edit(User $user){
    return view("admin.users.edit",['user'=>$user]);
  }
  public function update($request,User $user){
    $data=$request->validate([
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
    Alert::success("succes","users modify!"); 
    return redirect()->route("admin.index");
  }
  public function destroy(User $user){
    $user->delete();
    Alert::success('succes',"user is deleted ! ");
    return redirect()-route("admin.index");
  }
  public function products(User $user){
    $userOrders=Order::where('user_id',$user->id)->get();
    $userProductsOrders = Product::where('id',$userOrders->product_id)->get();
    $userProducts = Product::where('artisan_id',$user->id)->get();
    $orderPercentage = $userProductsOrders->count()/$userProducts->count(); 
    return [$userOrders->count(),$userProducts->count(),$orderPercentage,$userProductsOrders->count()];
  }
}
