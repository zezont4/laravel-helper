<?php namespace App\Traits;

trait UserRelationShips {

    /**
     * role() one-to-one relationship method
     *
     * @return QueryBuilder
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * projects one-to-many relationship method
     *
     * @return QueryBuilder
     */
//    public function projects()
//    {
//        return $this->hasMany('App\DB\Project\Project');
//    }
}