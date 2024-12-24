<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
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

        return view('backend.user.index');
    }
    private function dataTable()
    {
        $query = User::query();
            return DataTables::of($query)
                       ->addColumn('action' , function($user)
                       {
                        return view('backend.action.user_action' , ['user' => $user]);

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
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $attributes = $request->validated();
        if($request->hasFile('profile') && $request->file('profile')->isValid())
        {
            $file_name = uploadFile($request->profile , 'images');
            $attributes['profile'] = $file_name;
        }
        $attributes['password'] = bcrypt($attributes['password']);
        User::create($attributes);
        return redirect()->route('user-account.index')->with('success' , 'User is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user_account)
    {
        return view('backend.user.show' , ['user_account' => $user_account]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user_account)
    {
        return view('backend.user.edit' , ['user_account' => $user_account]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user_account)
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
        $user_account->update($attributes);
        return redirect()->route('user-account.index')->with('success' , 'User is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user_account)
    {
        $user_account->delete();
        return 'success';
    }
}
