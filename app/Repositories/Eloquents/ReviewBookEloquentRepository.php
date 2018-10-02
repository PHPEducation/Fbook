<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Review;
use App\Repositories\Contracts\ReviewBookRepository;
use Auth;

class ReviewBookEloquentRepository extends AbstractEloquentRepository implements ReviewBookRepository
{
    public function model()
    {
        return new Review;
    }

    public function store($data = [])
    {
        $data['user_id'] = Auth::user()->id;

        return $this->model()->create($data);
    }

    public function show($data = [])
    {
        $review = Review::where('book_id', '=', $data)
            ->orderBy('created_at', 'desc')
            ->get();

        return $review;
    }


    public function find($data)
    {
        $review = Review::where('book_id', '=', $data)->get();

        return $review;
    }

    public function findOrFail($id)
    {
        return $this->model()->findOrFail($id);
    }

    public function checkReview($data)
    {
        $data['user_id'] = Auth::user()->id;
        $isReview = Review::where('user_id', '=', $data['user_id'])
            ->where('book_id', '=', $data['book_id'])
            ->get();

        return $isReview;
    }

    public function update($data = [])
    {
        $model = $this->model()->findOrFail($data['id']);

        return $model->update($data);
    }

    public function destroy($id)
    {
        $review = $this->model()->findOrFail($id);

        return $review->delete();
    }
}
