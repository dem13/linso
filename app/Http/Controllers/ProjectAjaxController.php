<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Models\Project;
use App\Services\ProjectService;

class ProjectAjaxController extends Controller
{
    /**
     * @var ProjectService
     */
    private $projectService;

    public function __construct(\App\Services\ProjectService $projectServce)
    {
        $this->projectService = $projectServce;
    }

    /**
     * @param Project $project
     * @param LinkRequest $request
     * @return \App\Models\Link
     */
    public function addLink(Project $project, LinkRequest $request)
    {
        $link = $this->projectService->addLink($request->all(), $project);

        return $link;
    }

}
