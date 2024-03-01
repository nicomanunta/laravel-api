<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with('type', 'technologies')->orderBy('id', 'desc')->paginate(6);

        return response()->json([
            'success'=> true,
            'results'=> $projects,
        ]);
    }
}
