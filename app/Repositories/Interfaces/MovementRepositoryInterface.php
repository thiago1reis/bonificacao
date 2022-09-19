<?php

namespace App\Repositories\Interfaces;

use App\Models\Movement;
interface MovementRepositoryInterface extends BaseEloquentInterface
{
    public function __construct(Movement $movement);
    public function getMovements();
    public function searchMovements($name, $date, $type);
    public function getTypes();
    public function createMovement(array $data);
}