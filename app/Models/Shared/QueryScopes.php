<?php

namespace App\Models\Shared;

trait QueryScopes
{
    public function scopeFilters($query, $filters)
    {
        return $query->when($filters, function ($query, $filters) {
            foreach($filters as $filter => $value) {
                $value = match($value) {
                    'true' => true,
                    'false' => false,
                    default => $value,
                };
                
                $query->where($filter, '=', $value);
            }
            
            return $query;
        });
    }
    
    public function scopeSearch($query, $searchText)
    {
        // TODO -> hacer que pueda buscar por mas de un atributo
        return $query->when($searchText, function ($query, $search) {
            $searchColumn = self::$searchColumn;
            return $query->where($searchColumn, 'like', "%{$search}%");
        });
    }
        
    public function scopeSort($query, $sortColumn)
    {
        return $query->when($sortColumn, fn($query, $sortColumn) => 
            $query->orderBy($sortColumn));
    }
}