<?php

namespace App\Repositories;

use App\Http\Requests\SeriesRequestForm;
use App\Models\Serie;
use Illuminate\Http\Request;

interface SeriesRepository
{
    public function save(SeriesRequestForm $serie): Serie;

    public function destroy(Serie $series): Serie;

    public function edit(Serie $series, $request): void;
}
