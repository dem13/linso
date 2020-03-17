<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Models\Link;
use App\Repositories\LinkRepository;
use Illuminate\Http\JsonResponse;

class LinkController extends Controller
{
    /**
     * @var LinkRepository
     */
    private $linkRepo;

    public function __construct(\App\Repositories\LinkRepository $linkRepo)
    {
        $this->linkRepo = $linkRepo;
    }

    public function update(LinkRequest $request, Link $link)
    {
        $this->linkRepo->edit($link, $request->all());

        return $link;
    }

    public function destroy(Link $link)
    {
        $this->linkRepo->delete($link);

        return new JsonResponse([
            'ok' => true
        ]);
    }
}
