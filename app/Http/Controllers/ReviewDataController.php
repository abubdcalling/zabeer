<?php

namespace App\Http\Controllers;

use App\Models\ReviewData;
use Illuminate\Http\Request;

class ReviewDataController extends Controller
{
    // GET /api/review-data
    public function index()
    {
        return response()->json(ReviewData::all());
    }

    // POST /api/review-data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'star' => 'required|integer|min:1|max:5',
            'content' => 'required|string',
        ]);

        $review = ReviewData::create($request->only(['name', 'star', 'content']));

        return response()->json($review, 201);
    }

    // GET /api/review-data/{id}
    public function show($id)
    {
        return response()->json(ReviewData::findOrFail($id));
    }

    // PUT /api/review-data/{id}
    public function update(Request $request, $id)
    {
        $review = ReviewData::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string',
            'star' => 'sometimes|required|integer|min:1|max:5',
            'content' => 'sometimes|required|string',
        ]);

        $review->update($request->only(['name', 'star', 'content']));

        return response()->json($review);
    }

    // DELETE /api/review-data/{id}
    public function destroy($id)
    {
        ReviewData::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
