<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        //$projects = Project::all();

        $projects = Project::with(['technologies','type'])->paginate(4);
        
        // return response()->json([
        //     'message' => 'Lista Progetti',
        //     'results' => $projects
        // ]);
        return response()->json($projects);
    }
}
