<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Models\Cars;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function StoreCar(StoreCarRequest $storeCarRequest)
    {
        Cars::create($storeCarRequest->all());
    }
}
