<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\JsonResponse; 

class OrderController extends Controller
{
    public function index() 
    {
        $orders = Order::all();

        if ($orders->count() > 0) {
            return response()->json(['orders' => $orders]);
        } else {
            return response()->json([
                'orders' => 'No Orders Found'
            ]);
        }
    }

    public function create(OrderRequest $request)
    {
        // Create a new order
        $order = Order::create($request->validated());

        // Return a response
        return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
    }

    
    public function read($id) 
    {
        $order = Order::find($id);

        if ($order) {
            return response()->json([
                'order' => $order
            ]);
        } else {
            return response()->json([
                'order' => 'Order Not Found'
            ]);
        }
    } 

    public function update(OrderRequest $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $order->update($request->validated());
        return response()->json(['order' => $order], 200);
    }

    public function delete($id): JsonResponse
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Order soft deleted successfully'], 200);
    }
}


