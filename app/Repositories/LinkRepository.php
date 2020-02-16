<?php

namespace App\Repositories;

use App\Models\Link;
use App\Models\Project;

class LinkRepository
{
    /**
     * Create link
     *
     * @param array $data
     * @param Project $project
     * @return Link
     */
    public function create(array $data, Project $project): Link
    {
        $link = new Link();

        $link->fill($data);

        $link->project()->associate($project);

        $link->save();

        return $link;
    }

    /**
     * Edit link
     *
     * @param Link $link
     * @param array $data
     * @return bool
     */
    public function edit(Link $link, array $data): bool
    {
        $link->fill($data);

        return $link->save();
    }

    /**
     * Delete link
     * @param Link $link
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Link $link): ?bool
    {
        return $link->delete();
    }

    /**
     * Get links by project
     *
     * @param Project $project
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByProject(Project $project)
    {
        return $project
            ->links()
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
