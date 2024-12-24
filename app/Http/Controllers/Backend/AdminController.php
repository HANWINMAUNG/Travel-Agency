<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateRequest;

class AdminController extends Controller
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

        return view('backend.admin.index');
    }
    private function dataTable()
    {
        $query = Admin::query();
            return DataTables::of($query)
                       ->addColumn('action' , function($admin)
                       {
                        return view('backend.action.admin_action' , ['admin' => $admin]);

                       })
                       ->order(function ($admin)
                       {
                        $admin->orderBy('created_at' , 'desc');
                       })
                       ->addColumn('created_at' , function ($data)
                      {
                        return date('d-M-Y H:i:s' , strtotime($data->created_at));
                      })
                      ->addColumn('updated_at' , function ($data)
                      {
                        return Carbon::parse($data->updated_at)->format('d-M-Y H:i:s');
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
        return view('backend.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $attributes = $request->validated();
        if($request->hasFile('profile') && $request->file('profile')->isValid())
        {
            $file_name = uploadFile($request->profile , 'images');
            $attributes['profile'] = $file_name;
        }
        $attributes['password'] = bcrypt($attributes['password']);
        Admin::create($attributes);
        return redirect()->route('admin-account.index')->with('success' , 'Admin is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin_account)
    {
        return view('backend.admin.show' , ['admin_account' => $admin_account]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin_account)
    {
        return view('backend.admin.edit' , ['admin_account' => $admin_account]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateRequest $request, Admin $admin_account)
    {
        $attributes = $request->validated();
        if($request->hasFile('profile') && $request->file('profile')->isValid())
        {
            $file_name = uploadFile($request->profile , 'images');
            $attributes['profile'] = $file_name;
        }
        if(is_null($request->password)) {
            unset($attributes['password']);
        } else {
            $attributes['password'] = bcrypt($request->password);
        }
        $admin_account->update($attributes);
        return redirect()->route('admin-account.index')->with('success' , 'Admin is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin_account)
    {
        $admin_account->delete();
        return 'success';
    }
}
