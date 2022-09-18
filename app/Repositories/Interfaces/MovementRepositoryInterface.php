<?php

namespace App\Repositories\Interfaces;

use App\Models\Movement;


interface MovementRepositoryInterface extends BaseEloquentInterface
{
    public function __construct(Movement $movement);
    public function getMovements();
    public function getTypes();
  
}