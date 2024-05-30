<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all(); //If u want to print Relations' Values u can use ::with next to Model (Project) and ->get() to receive Values 
        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }
}
