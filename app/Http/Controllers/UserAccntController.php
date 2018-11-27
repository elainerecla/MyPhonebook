<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Http\Requests;
use App\Tbluser;
use App\Tblcontact;

use Hash;
use Auth;

class UserAccntController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            //Signup
            $this->validate($request,[
                'txtLastname' => 'required',
                'txtFirstname' => 'required',
                'rdbGender' => 'required',
                'txtAddress' => 'required',
                'txtPhonenum' => 'required',
                'txtEmailAdd' => 'required',
                'txtUsername' =>  'required',
                'txtPassword' => 'required',
                'txtConPassword' => 'required',
                'fileUploadprofile' => 'required|image|max:1999',
                'chkAgreeTerms' => 'required'
            ]);
    
            if($request->input('txtPassword')!=$request->input('txtConPassword')){
                return redirect()->back()->with('error', 'Password mismatch.')->withInput();
            }
    
            //Check file
            if($request->hasFile('fileUploadprofile')){
                //Filename with the extension
                $profilepicwithext = $request->file('fileUploadprofile')->getClientOriginalName();
    
                //Filename
                $filename = pathinfo($profilepicwithext, PATHINFO_FILENAME);
    
                //Extension
                $extension = $request->file('fileUploadprofile')->getClientOriginalExtension();
    
                //Store to DB
                $filenametostore = $filename.'_'.time().'.'.$extension;
            }else{
                $filenametostore = "noimage.png";
            }
    
            //Save to db TblUser
            $signup = new Tbluser;
            $signup->lastname = $request->input('txtLastname');
            $signup->firstname = $request->input('txtFirstname');
            $signup->gender = $request->input('rdbGender');
            $signup->address = $request->input('txtAddress');
            $signup->phonenumber = $request->input('txtPhonenum');
            $signup->username = $request->input('txtUsername');
            $signup->emailadd = $request->input('txtEmailAdd');
            $signup->password = Hash::make($request->input('txtPassword'));
            $signup->photofilename = $filenametostore;
            $signup->save();
            
            //Upload image
            Storage::disk('public')->put($filenametostore, File::get($request->file('fileUploadprofile')));

            return redirect('/loginuser')->with('success', 'Successfully registered, please try to login.'); 
        }
        catch (\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect('/signup')->with('error', 'Error! Please provide a unique entry for username, emailadd or phonenumber.')->withInput();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Login to dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        
        $this->validate($request, [
            'txtEmail' => 'required',
            'txtPassword' => 'required' 
        ]);

        if(Auth::attempt(array('emailadd' => $request->input('txtEmail'), 'password' => $request->input('txtPassword')))){
            return redirect('/');
        }else{
            return redirect('/loginuser')->with('error', 'Invalid credentials, please try again.');
        }
    }

    public function getUserImg($filename){
        $file=Storage::disk('public')->get($filename);
        return new Response($file, 200);
    }
}
