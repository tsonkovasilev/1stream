<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Stream;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StreamApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Stream::with('streamType')
            ->whereBelongsTo(auth()->user());

        // Filtering
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Ordering
        if ($request->filled('sort_by')) {
            $query->orderBy($request->sort_by, $request->get('sort_dir', 'asc'));
        }

        return response()->json($query->paginate(10));
    }

    public function store(Request $request)
    {
        if ($stream->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:655',
            'tokens_price' => 'required|integer',
            'type' => 'nullable|exists:stream_types,id',
            'date_expiration' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $stream = Stream::create([
            ...$validated,
            'id' => Str::uuid(),
            'user_id' => auth()->id() ?? 1, // fallback for public testing
        ]);

        return response()->json($stream, 201);
    }

    public function update(Request $request, Stream $stream)
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:655',
            'tokens_price' => 'required|integer',
            'type' => 'nullable|exists:stream_types,id',
            'date_expiration' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $stream->update($validated);

        return response()->json($stream);
    }

    public function destroy(Stream $stream)
    {
        $stream->delete();
        return response()->json(null, 204);
    }
}
