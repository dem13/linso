<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Repositories\LinkRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepo;

    /**
     * @var LinkRepository
     */
    private $linkRepo;

    /**
     * ProjectController constructor.
     * @param ProjectRepository $projectRepo
     * @param LinkRepository $linkRepo
     */
    public function __construct(ProjectRepository $projectRepo, \App\Repositories\LinkRepository $linkRepo)
    {

        $this->projectRepo = $projectRepo;
        $this->linkRepo = $linkRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = $this->projectRepo->getByUser(auth()->user());
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectRequest $request
     * @return Response
     */
    public function store(ProjectRequest $request)
    {
        $project = $this->projectRepo->create($request->all(), auth()->user());

        return redirect()->route('project.edit', ['project' => $project->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function show(Project $project)
    {
        $links = $this->linkRepo->getByProject($project);

        return view('project.show', compact('project', 'links'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Project $project
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Project $project)
    {
        $this->authorize('update-project', $project);

        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectRequest $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $this->authorize('update-project', $project);

        $this->projectRepo->edit($project, $request->all());

        return redirect()->route('project.edit', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
