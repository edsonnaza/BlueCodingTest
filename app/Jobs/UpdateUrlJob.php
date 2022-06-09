<?php

namespace App\Jobs;

use Goutte\Client;
use App\Models\Shortlink;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UpdateUrlJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $result;
    
    public function __construct()
    {
         
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        /** Get all data with empty title */
         $urls=  DB::table('short_links')
        ->whereRaw('title = "" OR title IS NULL')
        ->get();
                 
                     
        foreach ($urls as $value) // Iterate the urls array/object 
        {
                // url to search
               $url=$value->longlink; 
                
                $client=new Client();  
                // Search the title from the web page 
                $page=$client->request('GET',$url); 
                // Get the title content
                $title= $page->filter('title')->text(); 
                // Update the title into DDBB.
                Shortlink::where('id',$value->id)->update(['title'=>$title]);
        }       

         
    }
              
          
}
