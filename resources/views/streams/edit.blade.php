<!DOCTYPE html>
<html>
<head>
    <title>Edit Stream</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="wrapper">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
        <h2>Edit Stream</h2>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('streams.update', $stream) }}">
            @csrf
            @method('PUT')

            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $stream->title) }}" required>

            <label>Description</label>
            <textarea name="description">{{ old('description', $stream->description) }}</textarea>

            <label>Tokens Price</label>
            <input type="number" name="tokens_price" value="{{ old('tokens_price', $stream->tokens_price) }}" required>

            <label>Type</label>
            <select name="type">
                <option value="">-- None --</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type', $stream->type) == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>

            <label>Expiration Date (Y-m-d H:i:s)</label>
            <input type="text" name="date_expiration" value="{{ old('date_expiration', $stream->date_expiration) }}" required>

            <button type="submit">Update Stream</button>
            <a href="{{ route('dashboard') }}" class="button-link">Cancel</a>
        </form>
    </div>
</body>
</html>
