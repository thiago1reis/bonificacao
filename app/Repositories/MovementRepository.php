<?php

namespace App\Repositories;

use App\Models\Movement;
use App\Repositories\Abstract\BaseEloquentRepository;
use App\Repositories\Interfaces\MovementRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Database\Eloquent\Collection;

class MovementRepository extends BaseEloquentRepository implements MovementRepositoryInterface
{
    
}