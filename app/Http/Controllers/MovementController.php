<?php

namespace App\Http\Controllers;

use App\Services\MovementService;

class MovementController extends Controller
{
    protected $movementService;

    public function __construct(MovementService $movementService) 
    {
      $this->movementService = $movementService;
    }

    //Lista de todas as movimentações.
    public function index()
    {
        $movements = $this->movementService->getAll();
        return view('admin.movement.index', compact('movements'));
    }




}
