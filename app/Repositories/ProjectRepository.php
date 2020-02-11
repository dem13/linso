<?php

namespace App\Repositories;

use App\Models\Project;
use App\User;

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
}
