<?php

namespace App\Http\Controllers;
use Goutte\Client;
use App\WebContent;
use App\Models\Shortlink;
use App\Jobs\UpdateUrlJob;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UrlValidation;
use Illuminate\Support\Facades\Validator;
use App\Rules\UrlRule;
 

class LinksController extends Controller
{  protected $result;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
 
                            
           /** Get the data from de DDB
            Every Minute the background job checks if there any empty title 
            if any empty title the background job update it automatically. */
           $data=Shortlink::All();
           return view('home',compact('data'));
    }
    

        
   
    public function create(Request  $request)
    {       
         
     
             

    $input = $request->validate([
        'longlink' => 'required|url',
    ],
            [ 'longlink.required' => 'The url field can not be blank value.',
                'longlink.url' => 'The field must be a valid URL.'
            ]);

     
                           
                     // Make the shortlink code
                        $shortlink=str_random(6); 
                        $title="";

                        $shorlink=Shortlink::create([
                                    'shortlink'=>$shortlink,
                                    'longlink'=>$request->longlink,
                                    'counter'=>0,
                                    'title'=>$title
                            ]);

                        return redirect('/home')->with('message','Data Saved!');
                
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {     
       
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) 
    {    
         
            /** Every click count and save to de DDBB */
         $urldata=Shortlink::where('id',$request->id)->increment('counter');
                  
           
           /** Open the web site clicked */     
          return redirect($request->longlink); 
         
  
      
    
        return view('visitor', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Shortlink::findOrFail($id);
        return view('edit', compact('datas'));
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
        // Update de link counter +1 //
         Shortlink::findOrFail($id)->update($request->all());
        return redirect('home')->with('mensaje', 'Registro actualizado con éxito');
        
        
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


      
}
