<?php

namespace App\Http\Controllers;

use App\Models\Detection;
use Illuminate\Http\Request;

class DetectionController extends Controller
{
    public function index() 
    {
        $detections = Detection::all();

        if ($detections->count() > 0) {
            return response()->json(['orders' => $detections]);
        } else {
            return response()->json([
                'orders' => 'No Detections Found'
            ]);
        }
    }
}
