<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    /**
     * Create project
     *
     * @param array $data
     * @param $user
     * @return Project
     */
    public function create(array $data, $user): Project
    {
        $project = new Project();

        $project->fill($data);

        $project->user()->associate($user);

        $project->save();

        return $project;
    }

    /**
     * Edit project
     *
     * @param Project $project
     * @param array $data
     * @return bool
     */
    public function edit(Project $project, array $data)
    {
        $project->fill($data);

        return $project->save();
    }
}
