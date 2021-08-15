<?php

namespace App\Http\Controllers;

use App\Code;
use App\Form;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    public function checkCode(Request $request)
    {
        // dd("hello");
        $code = Code::where('key', $request->key)->first();
        if($code) {
            if($code->verified_at != null) {
                return redirect('/forms/'.$code->key.'/response');
            } 
            if(session()->has('error')) {
                session()->forget('error');
            }
            session(['access_key' => $code->key]);
            return redirect('/forms/'.$code->key.'/create');
        } else{   
            session(['error' => 'Invalid code']);
            return redirect('/');
        }
    }
    public function create()
    {
        if(session()->has('access_key')) {
            // session()->forget('access_key');
            return view('form.create');
        } else{
            abort(403);
        }
        
    }

    public function store(Request $request)
    {
        if(session()->has('access_key')) {
            $request->validate([
                'age' => 'required|integer',
                'city' => 'required',
                'acc_name' => 'required',
                'gender' => 'required|integer',
                'gender_you_want' => 'required|integer',
                'look_you_want' => 'required',
                'email' => 'required|email',
                'skin_tone_you_want' => 'required|integer',
                'height_you_want' => 'required|integer',
                'your_body_shape' => 'required|integer',
                'body_shape_you_want' => 'required|integer',
                'your_look' => 'required|integer',
                'age_you_want' => 'required',
                ]
            );
            $request->your_height_by_inch = $this->heightToInches($request->feet, $request->inches);
            $form = Form::create($request->all() + ["code" => session('access_key'),"your_height_by_inch" => $request->your_height_by_inch]);

            //code verifying
            $code = Code::where('key', $form->code)->first();
            $code->verified_at = Carbon::now();
            $code->save();

            //unset session
            session()->forget('access_key');
            return redirect('forms/'.$form->code.'/response');
        } else {
            abort(403);
        }
    }

    public function response($code)
    {
        return view('form.response',["code" => $code]);
    }

    public function edit($code)
    {
        $form = Form::where('code', $code)->first();
        return view('form.edit',["form" => $form]);
    }

    public function update(Request $request, $code)
    {
        $form = Form::where('code', $code)->first();
        $request->validate([
            'age' => 'required|integer',
            'city' => 'required',
            'acc_name' => 'required',
            'gender' => 'required|integer',
            'gender_you_want' => 'required|integer',
            'look_you_want' => 'required',
            'email' => 'required|email',
            'skin_tone_you_want' => 'required|integer',
            'height_you_want' => 'required|integer',
            'your_body_shape' => 'required|integer',
            'body_shape_you_want' => 'required|integer',
            'your_look' => 'required|integer',
            'age_you_want' => 'required',
            ]
        );
        $request->your_height_by_inch = $this->heightToInches($request->feet, $request->inches);
        $form->update($request->all());
        return redirect('forms/'.$form->code.'/response');
    }
    public function heightToInches($feet, $inches)
    {
        return $inches + ($feet * 12);
    }
}
