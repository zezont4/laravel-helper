<?php namespace App\Traits;

use Illuminate\Support\Facades\Request;

trait SearchFormHelper
{
    /**
     * search filter form a given array fo fields
     */
    public function scopeSearch($query)
    {
        return $query->where(function ($query) {
            for ($i = 0; $i < count($this->searchableFields); $i++) {
                $fieldValue = Request::get($this->searchableFields[$i], null);
                if ($fieldValue) {
                    if (is_numeric($fieldValue)) {
                        $query->where($this->searchableFields[$i], "$fieldValue");
                    } else {
                        $query->where($this->searchableFields[$i], 'LIKE', "%$fieldValue%");
                    }
                }
            }
        });
    }

    public function scopeSort($query)
    {
        $sort = Request::get('sort', null);

        return $sort ? $query->oldest($sort) : $query->latest();
    }
}