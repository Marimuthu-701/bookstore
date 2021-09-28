<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    /**
     * Constant variable
     * 
     * @var string
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
