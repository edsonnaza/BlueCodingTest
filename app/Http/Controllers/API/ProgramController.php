<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProgramResource;
use App\Models\Shortlink;

class ProgramController extends Controller
{
    public function index()
    { //dd('programs');
        $data = Shortlink::latest()->get();
        return response()->json([ProgramResource::collection($data), 'Programs fetched.']);
    }
}
