<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\City;
use App\Models\Package;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CityRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityUpdateRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            return $this->dataTable();
        }

        return view('backend.city.index');
    }
    private function dataTable()
    {
        $query = City::query();
        return DataTables::of($query)
                   ->order(function ($city)
                   {
                    $city->orderBy('created_at' , 'desc');
                   })
                   ->addColumn('package_id' , function($city)
                   {
                    return $city->Package->title;
                   })
                   ->order(function ($city)
                    {
                     $city->orderBy('created_at' , 'desc');
                    })
                    ->addColumn('created_at' , function ($data)
                    {
                        return date('d-M-Y H:i:s' , strtotime($data->created_at));
                    })
                      ->addColumn('updated_at' , function ($data)
                    {
                        return Carbon::parse($data->updated_at)->format('d-M-Y H:i:s');
                    })
                   ->addColumn('action' , function($city)
                   {
                    return view('backend.action.city_action' , ['city' => $city]);
                   })
                   ->rawColumns(['action'])
                   ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::query()->get();
        return view('backend.city.create',[
            'packages' => $packages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $attributes = $request->validated();
        if($request->hasFile('cover') && $request->file('cover')->isValid())
        {
            $file_name = uploadFile($request->cover , 'images');
            $attributes['cover'] = $file_name;
         }
         $images = [];
         if($request->hasFile('image')){
         $image_file = count($attributes['image']);
         if($image_file <= 4){
         foreach ($attributes['image'] as $image) {
             $file_name = uploadFile($image, 'images');
             array_push($images,$file_name);
          }
          $attributes['image'] = implode(',',$images);
         }else{
             return back()->withErrors(['error' => 'Image is 4 item allowed!'])->withInput();
         }
        }
         if($request->hasFile('video') && $request->file('video')->isValid())
         {
            $file_name = uploadFile($request->video , 'videos');
            $attributes['video'] = $file_name;
         } 
        // $attributes['course_id'] = $course->id;  
        City::create($attributes);
        return redirect()->route('city.index')->with('success' , 'City is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        $city_images = explode(',', $city->image);
        return view('backend.city.show' , ['city_images' => $city_images,'city' => $city]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $city_images = explode(',', $city->image);
        $package_city = $city->Package->id;
        // dd($package_city);
        $packages = Package::pluck('title', 'id')->toArray();
        // dd($packages);
        return view('backend.city.edit',[
            'city' => $city,
            'packages' => $packages,
            'package_city' => $package_city,
            'city_images' => $city_images
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityUpdateRequest $request,City $city)
    {
      
        $attributes = $request->validated();
        if($request->hasFile('cover') && $request->file('cover')->isValid())
        {
            $file_name = uploadFile($request->cover , 'images');
            $attributes['cover'] = $file_name;
         }
         $images = [];
         if($request->hasFile('image')){
         $image_file = count($attributes['image']);
         if($image_file <= 4){
         foreach ($attributes['image'] as $image) {
             $file_name = uploadFile($image, 'images');
             array_push($images,$file_name);
          }
          $attributes['image'] = implode(',',$images);
         }else{
             return back()->withErrors(['error' => 'Image is 4 item allowed!'])->withInput();
         }
        }
         if($request->hasFile('video') && $request->file('video')->isValid())
         {
            $file_name = uploadFile($request->video , 'videos');
            $attributes['video'] = $file_name;
         }
        $city->update($attributes);
        return redirect()->route('city.index')->with('success' , 'City is successfully updated!');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return 'success';
    }
}
