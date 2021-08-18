<?php

namespace App\Http\Controllers;

use App\Code;
use App\Form;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function apiForms()
    {
        return response()->json([
                "forms" => Form::all(),
                'error' => false

            ]
        , 200);
    }

    public function index()
    {
        return view('admin.home',["forms" => Form::all()->sortDesc()]);
    }


    //used modal instead of it
    // public function formDetail($id)
    // {
    //     // dd($id);
    //     return view('admin.form_detail',["form" => Form::find($id)]); 
    // }
    public function showCodes()
    {
        // dd($id);
        return view('admin.code',["codes" => Code::all()]); 
    }
    
    public function generateCode()
    {
        $code = new Code();
        $code->key = substr(md5(uniqid(mt_rand(), true)) , 0, 8);
        $code->save();
        return redirect('/admin/codes');
    }

    public function deleteCode($id)
    {
        Code::find($id)->delete();
        return redirect('/admin/codes');
    }

    public function deleteForm($id)
    {
        $form = Form::find($id);
        $code = Code::where('key',$form->code)->first();
        if($code) {
            $code->delete();
        }
        if(\File::exists('images/'.$form->photo)) {
            \File::delete('images/'.$form->photo);
        }
        $form->delete();
        return redirect('/dashboard');
    }
}
