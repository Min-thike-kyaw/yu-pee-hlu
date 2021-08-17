<?php

namespace App\Http\Controllers;

use App\Code;
use App\Form;
use Carbon\Carbon;

use Illuminate\Http\Request;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        

        // // $path = $request->file('photo')->store();
        // $path = Storage::disk('local')->put($filename, 'public');


        

        // // dd($filename);
        // if($path){
        //     dd($path);
        // }
        // exit;
        // dd($request->all());
        if(session()->has('access_key')) {
            $request->validate([
                
                'email' => 'required|email',
                'city' => 'required',

                'acc_name' => 'required',
                'acc_link' => 'required|url',
                'image' => 'required|image|max:10240',

                'age' => 'required|integer',
                'age_you_want' => 'required',

                'gender' => 'required|integer',
                'gender_you_want' => 'required|integer',

                'your_look' => 'required',
                'other_looks_you_want' => 'required',

                'your_skin_tone' => 'required|integer',
                'skin_tone_you_want' => 'required|integer',
                
                'height_you_want' => 'required|integer',

                'your_body_shape' => 'required|integer',
                'body_shape_you_want' => 'required|integer',
                
                ]
            );
            //image store

            $fileName = time().'.'.$request->image->extension();  

            $request->image->move(public_path('images'), $fileName);

            //form store
            $request->your_height_by_inch = $this->heightToInches($request->feet, $request->inches);
            $form = Form::create($request->all() + ["code" => session('access_key'),"your_height_by_inch" => $request->your_height_by_inch, "photo" => $fileName]);

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
                
            'email' => 'required|email',
            'city' => 'required',

            'acc_name' => 'required',
            'acc_link' => 'required|url',
            

            'age' => 'required|integer',
            'age_you_want' => 'required',

            'gender' => 'required|integer',
            'gender_you_want' => 'required|integer',

            'your_look' => 'required',
            'other_looks_you_want' => 'required',

            'your_skin_tone' => 'required|integer',
            'skin_tone_you_want' => 'required|integer',
            
            'height_you_want' => 'required|integer',

            'your_body_shape' => 'required|integer',
            'body_shape_you_want' => 'required|integer',
            
            ]
        );
        if($request->image == null) {
            $fileName = $form->photo;
        } else {
            // dd($request->image);
            $request->validate([
                'image' => 'image|max:10240',
            ]);
            $fileName = time().'.'.$request->image->extension();  

            $request->image->move(public_path('images'), $fileName);
            
            $request->photo = $fileName;

            //Delete former file
            if(\File::exists('images/'.$form->photo)) {
                \File::delete('images/'.$form->photo);
            }
        }
        $request->your_height_by_inch = $this->heightToInches($request->feet, $request->inches);
        $form->update($request->all() + ['photo' => $fileName]);
        return redirect('forms/'.$form->code.'/response');
    }
    public function heightToInches($feet, $inches)
    {
        return $inches + ($feet * 12);
    }
}
