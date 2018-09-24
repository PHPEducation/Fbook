<?php

namespace App\Repositories\Contracts;

use App\Eloquent\Review;

interface ReviewBookRepository extends AbstractRepository
{
    public function store($data = []);

    public function show($data = []);
}
