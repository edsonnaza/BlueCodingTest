<?php

namespace App\Http\Controllers;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Models\Shortlink;
use Illuminate\Support\Str;
use App\Jobs\UpdateUrlJob;
 

class LinksController extends Controller
{  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     // Dispatch the Job before load the view
          // dispatch(new UpdateUrlJob());
           $data=Shortlink::All();
           return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
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
