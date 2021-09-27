<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Author extends Model
{
    use HasFactory, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'slug',
        'address',
        'status',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Set constant Variable
     * 
     * @return String
     */
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * Set status scope Attribute
     * 
     * @return String
     */
    public function getstatusStringAttribute()
    {
        $status_str = trans('common.inactive');
        if ($this->status == self::STATUS_ACTIVE) {
            $status_str = trans('common.active');
        }
        return $status_str;
    }
}
