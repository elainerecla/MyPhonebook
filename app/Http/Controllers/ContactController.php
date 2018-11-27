<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Http\Requests;
use App\Tbluser;
use App\Tblcontact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($authid)
    {
        //Display Contact Page
        $contacts = Tblcontact::where('user_id', $authid)->orderBy('firstname', 'asc')->get();
        return view('pages.contacts')->with(['contacts' => $contacts]); 
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
            //Add New Contact
            $this->validate($request, [
                'txtLastname' => 'required',
                'txtFirstname' => 'required',
                'rdbGender' => 'required',
                'txtPhonenum' => 'required',
                'txtEmailAdd' => 'required',
                'fileUploadprofile' => 'required|image|max:1999'
            ]);

            //Check if phonenumber with the same user auth id exist
            $duplicatenumberuser = Tbluser::where([
                ['phonenumber', '=', $request->input('txtPhonenum')],
                ['id', '=', $request->input('txtUserIDAuth')]
            ])->get();
            
            $duplicatenumbercontact = Tblcontact::where([
                ['phonenumber', '=', $request->input('txtPhonenum')],
                ['user_id', '=', $request->input('txtUserIDAuth')]
            ])->get();

            if(count($duplicatenumberuser) > 0 || count($duplicatenumbercontact) > 0){
                return redirect('/contacts/'.$request->input('txtUserIDAuth'))->with('error', 'Error! Phonenumber already exist.')->withInput();
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

            //Save to db
            $addcontact = new Tblcontact;
            $addcontact->lastname = $request->input('txtLastname');
            $addcontact->firstname = $request->input('txtFirstname');
            $addcontact->gender = $request->input('rdbGender');
            $addcontact->phonenumber = $request->input('txtPhonenum');
            $addcontact->emailadd = $request->input('txtEmailAdd');
            $addcontact->photofilename = $filenametostore;
            $addcontact->user_id = $request->input('txtUserIDAuth');
            $addcontact->save();

            //Upload image
            Storage::disk('public')->put($filenametostore, File::get($request->file('fileUploadprofile')));

            return redirect('/contacts/'.$request->input('txtUserIDAuth'))->with('success', 'Successfully added!');
        }

        catch (\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect('/contacts/'.$request->input('txtUserIDAuth'))->with('error', 'Error! Please provide a unique entry for emailadd or phonenumber.');
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
        //Update Contact
        $this->validate($request, [
            'txtLastname' => 'required',
            'txtFirstname' => 'required',
            'rdbGender' => 'required',
            'txtPhonenum' => 'required',
            'txtEmailAdd' => 'required',
            'fileUploadprofile' => 'image|max:1999'
        ]);

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

            //Upload image
            /* $path = $request->file('fileUploadprofile')->storeAs('public/profiles', $filenametostore); */
            Storage::disk('public')->put($filenametostore, File::get($request->file('fileUploadprofile')));
            $url = asset('public/'.$filenametostore);
        }else{
            $filenametostore = "noimage.png";
        }

        //Save to db
        $updatecontact = Tblcontact::find($id);
        $updatecontact->lastname = $request->input('txtLastname');
        $updatecontact->firstname = $request->input('txtFirstname');
        $updatecontact->gender = $request->input('rdbGender');
        $updatecontact->phonenumber = $request->input('txtPhonenum');
        $updatecontact->emailadd = $request->input('txtEmailAdd');
        $updatecontact->photofilename = $filenametostore;
        $updatecontact->save();

        return redirect('/contacts')->with('success', 'Successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Contact

        //Delete data
        $deletecontact = Tblcontact::find($id);
        $deletecontact->delete();
        return redirect('/contacts')->with('success', 'Successfully deleted !');
    }
}
