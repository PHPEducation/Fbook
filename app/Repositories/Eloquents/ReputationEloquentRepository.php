<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Reputation;
use App\Repositories\Contracts\ReputationRepository;

class ReputationEloquentRepository extends AbstractEloquentRepository implements ReputationRepository
{
    public function model()
    {
        return new Reputation;
    }

    public function store($data = [])
    {
        return $this->model()->create($data);
    }

    public function destroy($userId)
    {
        $record = $this->find($userId);

        return $this->model()->destroy($record);
    }

    public function find($userId)
    {
        return $this->model()
            ->where('user_id', $userId)
            ->where('target_type', config('model.target_type.user'))
            ->where('target_id', Auth::id())
            ->first();
    }
}
