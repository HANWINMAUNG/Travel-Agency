<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\User;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
        $user = User::count();
        $admin = Admin::count();
        $category = Category::count();
        $package = Package::count();
        $city = City::count();
        $booking = Booking::count();
        return view('backend.home',
        [
            'user' => $user,
            'admin' => $admin,
            'category' => $category,
            'package' => $package,
            'city' => $city,
            'booking' => $booking,
        ]);
    }
}
