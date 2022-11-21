<?php

namespace App\Models\Shared;

trait QueryScopes
{
    public function scopeFilters($query, $filters, $sortColumn, $search)
    {
        // TODO -> hacer que pueda buscar por mas de un atributo
        // TODO -> hacer que pueda ordenar asc y desc
        $searchColumn = self::$searchColumn;
        return $query->when(
            $sortColumn,
            function ($query, $sortColumn) {
                return $query->orderBy($sortColumn);
            }
        )->when(
            $filters,
            function ($query, $filters) {
                foreach($filters as $filter => $value) {
                    $value = $value === 'true'; 
                    $query->where($filter, '=', $value);
                }
                return $query;
            }
        )->when(
            $search,
            function ($query, $search) use($searchColumn) {
                return $query->where($searchColumn, 'like', "%{$search}%");
            }
        );
    }
}