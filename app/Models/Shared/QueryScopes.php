<?php

namespace App\Models\Shared;

trait QueryScopes
{
    protected static $searchColumn;

    public function scopeFilters($query, $filters, $sortColumn, $search)
    {
        // TODO -> hacer que pueda buscar por mas de un atributo
        // TODO -> hacer que pueda ordenar asc y desc
        return $query->when(
            $filters,
            function ($query, $filters) {
                foreach($filters as $filter => $value) {
                    if($value === 'true') {
                        $value = true;
                    }
                    else if($value === 'false') {
                        $value = false; 
                    }
                    $query->where($filter, '=', $value);
                }
                return $query;
            }
            )->when(
                $search,
                function ($query, $search) {
                    $searchColumn = self::$searchColumn;
                    return $query->where($searchColumn, 'like', "%{$search}%");
                }
        )->when($sortColumn, fn($query, $sortColumn) => $query->orderBy($sortColumn));
    }
}