<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Image;

class Book extends Model
{
    use HasFactory, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'author_id',
        'category_id',
        'slug',
        'price',
        'pages',
        'media',
        'publication',
        'edition',
        'in_stock',
        'status',
    ];

    /**
     * Constant variable
     * 
     * @var string
     */
    const BOOK_COVER_PATH = '/books/media/';
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

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
     * Get belongs to the Author details
     * 
     * @return App\Models\Author
     */
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    /**
     * Get belongs to Book Category 
     * 
     * @return App\Models\BookCategory
     */
    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'category_id', 'id');
    }

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
    

    /**
     * Get Book Status
     * 
     * @return Array
     */
    public static function  bookStatus()
    {
        return [
            '1' => trans('common.active'),
            '0' => trans('common.inactive'),
        ];
    }

    /**
     * The stock status
     * 
     * @return Array
     */
    public static function  getStockStatus()
    {
        return [
            '0' => trans('common.no'),
            '1' => trans('common.yes')
        ];
    }

    /**
     * Files upload common method
     *
     * @param $file, imag_name
    */
    public static function uploadImage($file, $image_name)
    {
        try {
            $file_name    = Image::make($file);
            $imageFile    = $file_name->stream();
            $imageFile    = $imageFile->__toString();
            $uploadFile   = self::BOOK_COVER_PATH . $image_name;
            Storage::put($uploadFile, $imageFile);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
