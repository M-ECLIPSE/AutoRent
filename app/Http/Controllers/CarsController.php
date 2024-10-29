<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Resources\CarsResource;
use App\Models\Cars;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    public function StoreCar(StoreCarRequest $storeCarRequest)
    {
        $cars = Cars::create($storeCarRequest->all());
        if($storeCarRequest->hasFile('picture'))
        {
            $pictureUrl = Storage::putFile('/Cars',$storeCarRequest->picture);
            $cars->update([
                'url_picture'=>$pictureUrl
            ]);

        }
        return \response()->json([
            "massage" => "خودرو با موفقیت انجام شد",
            "data" => new CarsResource($cars)
        ],200);
    }

    public function show($id)
    {
        $cars = Cars::find($id);
        if($cars == null)
        {
            return Response()->json(
                [
                    'massage' => "خودرو مورد نظر یافت نشد"
                ]
                ,404);
        }
        else
        {
            return Response()->json([
                "massage" => "خودرو مورد نظر یافت شد",
                "data" => new CarsResource($cars)
            ]);
        }
        //return new CarsResource($cars);
    }

    public function showList()
    {
        $Cars = DB::table('Cars')->simplePaginate(1);
        if($Cars == null)
        {
            return Response()->json(
                [
                    'massage' => "ماشیتی وجود ندارد"
                ]
                ,404);
        }
        else
        {
            return Response()->json([
                "massage" => "لیست خودرو ها با موفقیت دریافت شد",
                "data" => CarsResource::collection($Cars)
            ]);
        }
    }
}


