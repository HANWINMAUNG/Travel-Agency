<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Http\Requests\PackageUpdateRequest;

class PackageController extends Controller
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

        return view('backend.package.index');
    }
    private function dataTable()
    {
        $query = Package::query();
        return DataTables::of($query)
                   ->order(function ($package)
                   {
                    $package->orderBy('created_at' , 'desc');
                   })
                   ->addColumn('category_id' , function($package)
                   {
                    return view('backend.action.package_category' , ['package' => $package]);
                   })
                   ->order(function ($package)
                    {
                     $package->orderBy('created_at' , 'desc');
                    })
                    ->addColumn('created_at' , function ($data)
                    {
                        return date('d-M-Y H:i:s' , strtotime($data->created_at));
                    })
                      ->addColumn('updated_at' , function ($data)
                    {
                        return Carbon::parse($data->updated_at)->format('d-M-Y H:i:s');
                    })
                   ->addColumn('action' , function($package)
                   {
                    return view('backend.action.package_action' , ['package' => $package]);
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
        $categories = Category::toBase()->get()->pluck('title', 'id')->toArray();
        return view('backend.package.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {
        $attributes = $request->validated();
        if($request->hasFile('cover_photo') && $request->file('cover_photo')->isValid())
        {
            $file_name = uploadFile($request->cover_photo , 'images');
            $attributes['cover_photo'] = $file_name;
         }
         if($request->hasFile('image') && $request->file('image')->isValid()){
            $file_name = uploadFile($request->image , 'images');
            $attributes['image'] = $file_name;
         }
       
        $category = $attributes['category'];
        unset($attributes['category']);
        $package = Package::create($attributes);
        $package->Category()->attach($category); 
        return redirect()->route('package.index')->with('success' , 'Package is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        foreach($package->Category as $category)
            {
               $package_category =  $category->title;
            }
        return view('backend.package.show',['package' => $package,'package_category' => $package_category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $category_packages = $package->Category->toBase()->pluck('id', 'id')->toArray();
        $categories = Category::pluck('title', 'id')->toArray();
        return view('backend.package.edit',[
            'package' => $package,
            'categories' => $categories,
            'category_packages' => $category_packages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PackageUpdateRequest $request,Package $package)
    {
        $attributes = $request->validated();

        if($request->hasFile('cover_photo') && $request->file('cover_photo')->isValid())
        {
            $file_name = uploadFile($request->cover_photo , 'images');
            $attributes['cover_photo'] = $file_name;
         }
         if($request->hasFile('image') && $request->file('image')->isValid())
         {
            $file_name = uploadFile($request->image , 'images');
            $attributes['image'] = $file_name;
         }
         $category =$attributes['category'];
         unset($attributes['category']);
        $package->update($attributes);
        $package->Category()->sync($category);
        return redirect()->route('package.index')->with('success' , 'Package is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return 'success';
    }
}
