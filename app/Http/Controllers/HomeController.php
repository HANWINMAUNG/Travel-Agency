<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Package;
use App\Models\Category;
use App\Models\CategoryPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();
        $citys = City::latest()->get();
        return view('frontend.welcome',['packages' => $packages , 'citys' => $citys]);
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function package(Request $request)
    {
        if(isset($request->category)) {
            $category_id = Category::where('slug', $request->category)->value('id');

            $package_ids = CategoryPackage::where('category_id', $category_id)->pluck('package_id')->toArray();
            $packages = Package::whereIn('id', $package_ids)->paginate(9);
        }else{
            $packages = Package::paginate(6);
        }
        $categories = Category::get();

        return view('frontend.packages.package', compact('packages', 'categories'));
    }
    public function packageDetail(Package $package)
    {
        Session::put('package_slug', $package->slug);
        $cities = $package->City;
        return view('frontend.packages.package_detail', compact('package','cities'));
    }
    public function cityDetail($package,City $city)
    {
        $city_images = explode(',', $city->image);
        return view('frontend.packages.city_detail',['city_images' => $city_images,'city' => $city]);
    }
    public function blog()
    {
        return view('frontend.blog');
    }
    public function destination()
    {
        $citys = City::paginate(8);
        return view('frontend.destinations',['citys' => $citys]);
    }
    public function cityDestinationDetail(City $city)
    {
        $city_images = explode(',', $city->image);
        return view('frontend.city_detail',['city_images' => $city_images,'city' => $city]);
    }
    public function contact()
    {
        return view('frontend.contact');
    }
}
