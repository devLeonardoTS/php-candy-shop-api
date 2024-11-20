<?php

namespace App\Http\Controllers;

use App\Models\Candy;
use App\Models\StoreStats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandyController extends Controller
{
    public function index()
    {
        return response()->json(Candy::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('candies', 'public');
        }

        $candy = Candy::create($data);
        return response()->json($candy, 201);
    }

    public function update(Request $request, $id)
    {
        $candy = Candy::findOrFail($id);

        $data = $request->validate([
            'name' => 'string',
            'price' => 'numeric',
            'stock' => 'integer',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($candy->image) {
                Storage::disk('public')->delete($candy->image);
            }
            $data['image'] = $request->file('image')->store('candies', 'public');
        }

        $candy->update($data);
        return response()->json($candy);
    }

    public function destroy($id)
    {
        $candy = Candy::findOrFail($id);
        if ($candy->image) {
            Storage::disk('public')->delete($candy->image);
        }
        $candy->delete();
        return response()->json(['message' => 'Candy deleted']);
    }

    public function sell($id)
    {
        $candy = Candy::findOrFail($id);

        if ($candy->stock > 0) {
            $candy->decrement('stock');

            // Update Store Stats
            $stats = StoreStats::find(1);
            $stats->increment('total_candies_sold');
            $stats->increment('total_revenue', $candy->price);

            return response()->json([
                'message' => 'Candy sold!',
                'remaining_stock' => $candy->stock,
                'total_candies_sold' => $stats->total_candies_sold,
                'total_revenue' => $stats->total_revenue
            ]);
        }

        return response()->json(['message' => 'Out of stock!'], 400);
    }

    public function stats()
    {
        $stats = StoreStats::find(1);
        return response()->json($stats);
    }
}
