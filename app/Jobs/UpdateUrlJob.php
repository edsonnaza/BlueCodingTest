<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Goutte\Client;
use App\Models\Shortlink;

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
                $client=new Client();
                 $url="https://es.newchic.com/women-t-shirts-c-3666/?mg_id=1&from=nav&country=166&SA=0"; // url to search
                 $page=$client->request('GET',$url); // Get the content from de the page

                    // Search the title from the web 
                 $page->filter('title')->each(function($item){
                           $title= $item->text(); // Search the Title from the web tag= 'Title'
                            $this->result=$title; // this is a private variable, when the title is ready this variable take de title name.
                
                    });
                    
                            // Make the shortlink code
                           $shortlink=str_random(6); 
                            // Take the title to save to the DDBB.
                           $title=$this->result;

                            // Finally sAve all the new data to the DDBB //
                            $shorlink=Shortlink::create([
                                    'shortlink'=>$shortlink,
                                    'longlink'=>$url,
                                    'counter'=>0,
                                    'title'=>$title
                            ]);
            
    }
}
