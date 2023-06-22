<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['type', 'technologies'])->paginate(12);
        return response()->json([
            'success' => 'true',
            'result' => $projects,

        ]);
    }
    public function show($slug)
    {
        $project = Project::with('Type', 'Technologies')->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'No Project found'
            ]);
        }
    }
}
