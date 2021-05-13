<?php

namespace EvolutionCMS\Example\Services;

use EvolutionCMS\Example\Models\ExampleItem;

class ExampleItems
{
    public function getQuery($filter = [])
    {
        $query = ExampleItem::query();

        // TODO: filter logic

        return $query;
    }

    public function getList($filter = [])
    {
        return $this->getQuery($filter)->get();
    }

    public function getPaginatedList($limit = 50, $filter = [])
    {
        $query = $this->getQuery($filter);

        $list = $query->paginate($limit);

        return $list;
    }
}
