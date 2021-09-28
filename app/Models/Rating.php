<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Rating extends Model
{
    /**
     * @var string
     */
    protected $table = 'reviews';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function reviewrateable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function author()
    {
        return $this->morphTo('author');
    }

    /**
     * @param Model $reviewrateable
     * @param $data
     * @param Model $author
     *
     * @return static
     */
    public function createRating(Model $reviewrateable, $data, Model $author)
    {
        $rating = new static();
        $rating->fill(array_merge($data, [
            'author_id' => $author->id,
            'author_type' => get_class($author),
        ]));

        $reviewrateable->ratings()->save($rating);

        return $rating;
    }

    /**
     * @param $id
     * @param $data
     *
     * @return mixed
     */
    public function updateRating($id, $data)
    {
        $rating = static::find($id);
        $rating->update($data);

        return $rating;
    }

    /**
     * @param $id
     * @param $sort
     * @param $type
     * @return mixed
     */
    public function getAllRatings($id, $type, $sort = 'desc')
    {
        $rating = $this->select('*')->where('reviewrateable_id', $id)->where('approved', true)
                ->orderBy('created_at', $sort)->get();
        return $rating;
    }

    /**
     * @param $id
     * @param $sort
     * @return mixed
     */
    public function getApprovedRatings($id, $sort = 'desc')
    {
        $rating = $this->select('*')
            ->where('reviewrateable_id', $id)
            ->where('approved', true)
            ->orderBy('created_at', $sort)
            ->get();

        return $rating;
    }

    /**
     * @param $id
     * @param $sort
     * @return mixed
     */
    public function getNotApprovedRatings($id, $sort = 'desc')
    {
        $rating = $this->select('*')
            ->where('reviewrateable_id', $id)
            ->where('approved', false)
            ->orderBy('created_at', $sort)
            ->get();

        return $rating;
    }

    /**
     * @param $id
     * @param $type
     * @param $limit
     * @param $sort
     * @return mixed
     */
    public function getRecentRatings($id, $type, $limit = 5, $sort = 'desc')
    {
        $rating = $this->selectRaw('AVG(rating) as avarage, reviewrateable_id, rating, body, recommend, author_id, created_at')
                  ->where('approved', true)->where('recommend', true)->where('reviewrateable_id', $id)
                  ->orderBy('created_at', $sort)->limit($limit)->groupBy('reviewrateable_id')->get();
        return $rating;
    }

    /**
     * @param $id
     * @param $limit
     * @param $approved
     * @param $sort
     * @return mixed
     */
    public function getRecentUserRatings($id, $limit = 5, $approved = true, $sort = 'desc')
    {
        $rating = $this->select('*')
            ->where('author_id', $id)
            ->where('approved', $approved)
            ->orderBy('created_at', $sort)
            ->limit($limit)
            ->get();

        return $rating;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteRating($id)
    {
        return static::find($id)->delete();
    }

    /**
     * @param $id
     * @param $type
     * @return mixed
     */
    public function averageRatingByType($id)
    {   
        $user_id = User::pluck('id');
        $avarage = $this->selectRaw('AVG(rating) as avarage')->whereIn('author_id', $user_id)->where('approved', true)
                ->where('reviewrateable_id', $id)->groupBy('reviewrateable_id')->get();
        return $avarage;
    }
}
