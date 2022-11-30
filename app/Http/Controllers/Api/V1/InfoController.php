<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInfoRequest;
use App\Http\Resources\V1\InfoCollection;
use App\Http\Resources\V1\InfoResource;
use App\Http\Resources\V1\SkillCollection;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index(){
        return new InfoCollection(Info::all());
    }

    public function store(StoreInfoRequest $request){
        Info::create($request->validated());
        return response()->json("Info Created");
    }

    public function show(Info $info){
        return new InfoResource($info);
    }

    public function update(StoreInfoRequest $request, Info $info){
        $info->update($request->validated());
        return response()->json("Info Updated");
    }

    public function destroy(Info $info){
        $info->delete();
        return response()->json("Info Deleted");
    }
}
