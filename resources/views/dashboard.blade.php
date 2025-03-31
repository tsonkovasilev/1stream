<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

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
        <hr>
        <table id="streams-table" border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Tokens</th>
                    <th>Type</th>
                    <th>Expires</th>
                    <th>User</th>
                    @if (auth()->check())
                        <th>Actions</th>
                    @endif
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
                        
                            @if (auth()->check() && $stream->user_id === auth()->id())
                                <td>
                                <a class="button-link" href="{{ route('streams.edit', $stream) }}">Edit</a>
                                <form action="{{ route('streams.destroy', $stream) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete this stream?')">Delete</button>
                                </form>
                                </td>
                                @else
                                <!-- TODO -->
                            @endif
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No streams found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- jQuery (required) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#streams-table').DataTable();
        });
    </script>
</body>
</html>
