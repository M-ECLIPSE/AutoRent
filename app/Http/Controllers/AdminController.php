<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\HttpCache\Store;

use http\Env\Response;



class AdminController extends Controller
{
    public function StoreAdmin(StoreAdminRequest $storeAdminRequest)
    {
        $Admin = Admin::create($storeAdminRequest->all());
        if($storeAdminRequest->hasFile('picture'))
        {
            $pictureUrl = Storage::putFile('/Admin',$storeAdminRequest->picture);
            $Admin->update([
                'url_picture'=>$pictureUrl
            ]);

        }
        return \response()->json([
            "massage" => "ادمین با موفقیت انجام شد",
            "data" => new AdminResource($Admin)
        ],200);
    }

    public function show($id)
    {
        $Admin = Admin::find($id);
        if($Admin == null)
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
                "data" => new AdminResource($Admin)
            ]);
        }
        //return new CarsResource($cars);
    }

    public function showList()
    {
        $Admin = DB::table('admins')->simplePaginate(1);
        if($Admin == null)
        {
            return Response()->json(
                [
                    'massage' => "ادمین وجود ندارد"
                ]
                ,404);
        }
        else
        {
            return Response()->json([
                "massage" => "لیست ادمین ها با موفقیت دریافت شد",
                "data" => AdminResource::collection($Admin)
            ]);
        }
    }
}
