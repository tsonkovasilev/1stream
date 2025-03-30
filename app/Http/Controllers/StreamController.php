<?php

namespace App\Http\Controllers;

use App\Models\Stream;
use App\Models\StreamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StreamController extends Controller
{
    public function index()
    {
        $streams = Stream::with('streamType')
            ->where('user_id', Auth::id())
            ->paginate(10);

        return view('dashboard', compact('streams'));
    }

    public function create()
    {
        $types = StreamType::all();
        return view('streams.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:655',
            'tokens_price' => 'required|integer',
            'type' => 'nullable|exists:stream_types,id',
            'date_expiration' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $validated['id'] = Str::uuid();
        $validated['user_id'] = Auth::id();

        Stream::create($validated);

        return redirect()->route('dashboard');
    }

    public function edit(Stream $stream)
    {
        $this->authorizeAccess($stream);

        $types = StreamType::all();
        return view('streams.edit', compact('stream', 'types'));
    }

    public function update(Request $request, Stream $stream)
    {
        $this->authorizeAccess($stream);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:655',
            'tokens_price' => 'required|integer',
            'type' => 'nullable|exists:stream_types,id',
            'date_expiration' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $stream->update($validated);

        return redirect()->route('dashboard');
    }

    public function destroy(Stream $stream)
    {
        $this->authorizeAccess($stream);
        $stream->delete();

        return redirect()->route('dashboard');
    }

    private function authorizeAccess(Stream $stream)
    {
        if ($stream->user_id !== Auth::id()) {
            abort(403);
        }
    }
}

