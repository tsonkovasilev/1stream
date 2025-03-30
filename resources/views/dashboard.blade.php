<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="wrapper">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
        <h2>Streams Dashboard</h2>

        @if (auth()->check())
            <p>Welcome, {{ auth()->user()->name }}</p>
            <a href="{{ route('streams.create') }}" class="button-link">+ Add Stream</a>
            <div class="actions">
                
               
                <form action="/logout" method="POST">
                    @csrf
                    <button>Logout</button>
                </form>
            </div>
        @else
            <div style="text-align: center; margin-bottom: 10px;">
                <a class="button-link" href="/login">Login</a>
            </div>
        @endif

        <table id="streams-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Tokens</th>
                    <th>Type</th>
                    <th>Expires</th>
                    <th>User</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($streams as $stream)
                    <tr>
                        <td>{{ $stream->title }}</td>
                        <td>{{ $stream->tokens_price }}</td>
                        <td>{{ $stream->streamType->name ?? 'N/A' }}</td>
                        <td>{{ $stream->date_expiration }}</td>
                        <td>{{ $stream->user->name ?? 'N/A' }}</td>
                        <td>
                            @if (auth()->check() && $stream->user_id === auth()->id())
                                <a class="button-link" href="{{ route('streams.edit', $stream) }}">Edit</a>
                                <form action="{{ route('streams.destroy', $stream) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete this stream?')">Delete</button>
                                </form>
                            @else
                                <em>View only</em>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No streams found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Optional DataTable script if needed -->
</body>
</html>
