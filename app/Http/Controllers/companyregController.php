<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\companyregisters;
use Auth;
use App\User;

class companyregController extends Controller
{

	    public function __construct()
    {
        $this->middleware('auth');
    }

	    public function create(){
     
           return view('home');
            
       	
	    }

	    public function store(Request $request){
	    
	    $companyreg = new companyregisters();
        

        $companyreg->companyName = $request->input('companyName');
        $companyreg->companyregNo = $request->input('companyregNo');
        $companyreg->category = $request->input('category');
        $companyreg->user_id = Auth::user()->id;

         if ($request->hasfile('file')) {
            
            foreach ($request->file as $file) {

                $filename = $file->getClientOriginalName();

                $file->storeAs('public/upload',$filename);

                $companyreg->file = $filename;
            
            }
    }  
        $companyreg->save();
        
        return redirect()->to('voucherdetails');
	    	
	    }

	
}
