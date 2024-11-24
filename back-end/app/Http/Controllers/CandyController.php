<?php

namespace App\Http\Controllers;

use App\Models\Candy;
use App\Models\CandySaleStat;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class CandyController extends Controller
{
    public function index()
    {
        return response()->json(Candy::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:candies,name',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048'
        ], [
            'name.unique' => 'Já existe um doce com esse nome. Por favor, escolha um nome diferente.',
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
        $candy = Candy::withoutActiveScope()->findOrFail($id);
        if ($candy->image) {
            Storage::disk('public')->delete($candy->image);
        }
        $candy->delete();
        return response()->json(['message' => 'Candy deleted']);
    }

    public function getInactive()
    {
        // Query candies without the global scope and filter for inactive ones
        $deactivatedCandies = Candy::withoutGlobalScope('active')
            ->where('is_active', false)
            ->get();

        return response()->json($deactivatedCandies);
    }

    public function deactivate($id)
    {
        $candy = Candy::findOrFail($id);
        $candy->update(['is_active' => false]);

        return response()->json(['message' => 'Candy deactivated successfully!']);
    }

    public function restore($id)
    {
        $candy = Candy::withoutActiveScope()->findOrFail($id);
        $candy->update(['is_active' => true]);

        return response()->json(['message' => 'Candy restored successfully!']);
    }

    public function sell($id)
    {
        $candy = Candy::findOrFail($id);

        if ($candy->stock > 0) {
            $candy->decrement('stock');

            // Log the sale
            Sale::create([
                'candy_id' => $candy->id,
                'price' => $candy->price,
            ]);

            return response()->json([
                'message' => 'Candy sold!',
                'remaining_stock' => $candy->stock
            ]);
        }

        return response()->json(['message' => 'Out of stock!'], Response::HTTP_BAD_REQUEST);
    }

    public function salesHistory()
    {
        $sales = Sale::with('candy')->get();
        return response()->json($sales);
    }


    public function stats()
    {
        $stats = CandySaleStat::first();

        $mostSoldCandy = Candy::withCount('sales')
            ->orderByDesc('sales_count')
            ->first();

        $leastSoldCandy = Candy::withCount('sales')
            ->orderBy('sales_count')
            ->first();

        return response()->json([
            'total_candies_sold' => $stats->total_candies_sold ?? 0,
            'total_revenue' => $stats->total_revenue ?? 0.00,
            'most_sold_candy' => $mostSoldCandy,
            'least_sold_candy' => $leastSoldCandy
        ]);
    }
}
