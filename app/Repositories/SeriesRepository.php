<?php

namespace App\Repositories;

use App\Http\Requests\SeriesRequestForm;
use App\Models\Serie;
use Illuminate\Http\Request;

interface SeriesRepository
{
    public function save(SeriesRequestForm $request): Serie;

    public function destroy(Serie $series): Serie;
}
