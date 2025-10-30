<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    public function store(Request $request)
    {
        $data = new SensorData();
        $data->name = $request->name;
        $data->status = $request->status;
        $data->temperature = $request->temperature;
        $data->humidity = $request->humidity;
        $data->latitude = $request->latitude; // Simpan latitude
        $data->longitude = $request->longitude; // Simpan longitude
        $data->save();

        return response()->json(['message' => 'Data saved successfully'], 201);
    }

    public function index()
    {
        $data = SensorData::all();
        return response()->json($data);
    }
    public function showMap()
    {
        $sensorData = SensorData::where('status', 'active')->orderBy('created_at', 'desc')->get();
        return view('sensors.map', compact('sensorData'));
    }
    public function destroy($id)
    {
        return SensorData::destroy($id);
    }
    public function update(Request $request,$id)
    {
        $sensorData = SensorData::findOrFail($id);
        $sensorData->update($request->all());
    }
}