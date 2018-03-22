<?php

namespace App\Http\Controllers;

use App\Project;
use App\Http\Requests\SaveProject;
use Illuminate\Http\Request;

class ProjectManagementController extends Controller
{
    var $paginationLimit = 20;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'pages/management-console/projects/index',
            [
                'projects' => Project::paginate($this->paginationLimit),
            ]
        );
    }

    public function newProject()
    {
        return view('pages/management-console/projects/new');
    }

    public function addNewProject(SaveProject $request)
    {
        $project = new Project();

        $project->title    = $request->title;
        $project->link     = $request->link;
        $project->contents = $request->content;
        $project->save();

        return redirect()->route('project-management-index');
    }

    public function editProject($id)
    {
        $project = Project::find($id);

        return view('pages/management-console/projects/edit', ['project' => $project]);
    }

    public function updateProject(SaveProject $request, $id)
    {
        $project = Project::find($id);

        $project->title    = $request->title;
        $project->link     = $request->link;
        $project->contents = $request->content;
        $project->save();

        return redirect()->route('project-management-index');
    }

    public function deleteProject($id)
    {
        Project::destroy($id);

        return redirect()->route('project-management-index');
    }
}
