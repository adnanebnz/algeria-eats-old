<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class AdminController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');

    $this->middleware('admin');
  }


  public function index()
  {
    // TODO PLACE THESE STATS IN UI
    $analyticsData = Analytics::fetchMostVisitedPages(Period::days(7));
    $analyticsData1 = Analytics::fetchVisitorsAndPageViews(Period::days(7));
    $analyticsData2 = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));
    $analyticsData3 = Analytics::fetchTopReferrers(Period::days(7));
    $analyticsData4 = Analytics::fetchUserTypes(Period::days(7));
    $analyticsData5 = Analytics::fetchTopBrowsers(Period::days(7));
    $analyticsData6 = Analytics::fetchTopOperatingSystems(Period::days(7));
    dd($analyticsData, $analyticsData1, $analyticsData2, $analyticsData3, $analyticsData4, $analyticsData5, $analyticsData6);
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
      // TODO ADD WILAYA
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
}
