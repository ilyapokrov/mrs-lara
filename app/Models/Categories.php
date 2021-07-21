<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Categories extends Model
{
    use CrudTrait, Sluggable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'categories';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
//    protected $fillable = ['name'];
    // protected $hidden = [];
    // protected $dates = [];
    protected $translatable = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        if(!$this->slug) {
            return [
                'slug' => [
                    'source' => 'name'
                ]
            ];
        }

        return [];
    }

//    public function getParents()
//    {
//        $parents = collect([]);
//
//        $parent = $this->parent;
//
//        while (!is_null($parent)) {
//            $parents->push($parent);
//            $parent = $parent->parent;
//        }
//
//        return $parents;
//    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function parent()
    {
        return $this->belongsTo(self::class);
    }

    public function child()
    {
        return $this->hasMany(self::class, 'parent_id')->with('child');
    }

    public function products()
    {
        return $this->belongsToMany(Products::class, 'category_product', 'category_id', 'product_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

}
