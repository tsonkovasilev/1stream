<h2>Welcome, {{ auth()->user()->name }}</h2>

<a href="{{ route('streams.create') }}">+ Add New Stream</a>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Title</th>
            <th>Tokens</th>
            <th>Type</th>
            <th>Expires</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($streams as $stream)
            <tr>
                <td>{{ $stream->title }}</td>
                <td>{{ $stream->tokens_price }}</td>
                <td>{{ $stream->streamType->name ?? 'N/A' }}</td>
                <td>{{ $stream->date_expiration }}</td>
                <td>
                    <a href="{{ route('streams.edit', $stream) }}">Edit</a>
                    <form action="{{ route('streams.destroy', $stream) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this stream?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<form action="/logout" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
