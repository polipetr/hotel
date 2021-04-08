<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AccountController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role', 'admin')->get();
        return view('admin.account.view')
            ->with('user', $user);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.account.create');
       
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'first_name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = $request->all();
        $data['role'] = 'admin';
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        return redirect()->route('account.view');

        
    }

}
