<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\MessageBag;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Package::all();

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $data = Package::findOrFail($id);
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePackageRequest $request)
    {
        $data = Package::create($request->all());

        return response()->json($data, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, $id)
    {
        $packaga = Package::findOrFail($id);
        $packaga->update($request->all());

        return response()->json($packaga, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePartial(Request $request, $id)
    {
        $packageRules = Package::$rules;
        $rules = [];
        foreach ($request->all() as $key => $value) {
            $rules[$key] = $packageRules[$key];
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid data send',
                'details' => $validator->messages()->get('*'),
            ], 422);
        }

        $packaga = Package::findOrFail($id);
        foreach ($request->all() as $key => $value) {
            $packaga[$key] = $value;
        }

        $packaga->save();

        return response()->json($packaga, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $packaga = Package::findOrFail($id);
        $packaga->delete();

        return response()->json('Success', 200);
    }
}
