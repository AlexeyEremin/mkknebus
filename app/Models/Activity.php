<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at', 'pivot', 'nesting'];
    protected $with = ['parent'];

    protected static function booted()
    {
        static::saving(function ($model) {
            if(is_null($model->parent_id)) {
                $model->nesting = 0;
            }
            else if (is_null($model->nesting) && (!is_null($model->parent_id) && $model->parent_id !== 0)) {
                $model->nesting = self::find($model->parent_id)->nesting + 1;
            }
        });
    }

    public function parent()
    {
        return $this->belongsTo(Activity::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(Activity::class, 'parent_id');
    }

    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'organization_activity');
    }

    public function getIdsNesting()
    {
        $ids = [];
        if($this->nesting == 2)
            return [];
        else if($this->children()->count() > 0) {
            foreach($this->children as $child) {
                if($nestingIds = $child->getIdsNesting())
                    $ids = array_merge($ids, $nestingIds);
            }
            return array_merge($this->children()->pluck('id')->toArray(), $ids);
        }
        return $ids;
    }
}
