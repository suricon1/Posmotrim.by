<?php

namespace App\Repositories;

use App\Models\Site\Region;

class RegionRepository
{
    public function getRegion($slug)
    {
        return Region::with('parent', 'children')
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function getAllRegionsByMenu($id)
    {
        return Region::select('name', 'slug')
            ->where('parent_id', $id)
            ->orderBy('name')
            ->pluck('name', 'slug')
            ->all();
    }

    public function getAllRegionId($region)
    {
        return $region->children->pluck('id')->merge($region->id)->toArray();
    }
}