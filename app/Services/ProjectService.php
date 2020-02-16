<?php

namespace App\Services;

use App\Models\Link;
use App\Models\Project;
use App\Repositories\LinkRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
    private $projectRepo;

    /**
     * @var LinkRepository
     */
    private $linkRepo;

    public function __construct(ProjectRepository $projectRepo, LinkRepository $linkRepo)
    {
        $this->projectRepo = $projectRepo;
        $this->linkRepo = $linkRepo;
    }

    /**
     * Add link to project
     *
     * @param $project
     * @param array $data
     * @return Link
     */
    public function addLink(array $data, $project): Link
    {
        if (!$project instanceof Project && !$project = $this->projectRepo->find($project)) {
            throw new ModelNotFoundException('Project not found');
        }

        return $this->linkRepo->create($data, $project);
    }
}
