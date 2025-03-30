<!DOCTYPE html>
<html>
<head>
    <title>Add New Stream</title>
</head>
<body>
    <h2>Create New Stream</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('streams.store') }}">
        @csrf

        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title') }}" required maxlength="255">
        </div>

        <div>
            <label>Description:</label>
            <textarea name="description" maxlength="655">{{ old('description') }}</textarea>
        </div>

        <div>
            <label>Tokens Price:</label>
            <input type="number" name="tokens_price" value="{{ old('tokens_price') }}" required>
        </div>

        <div>
            <label>Type:</label>
            <select name="type">
                <option value="">-- None --</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Expiration Date (Y-m-d H:i:s):</label>
            <input type="text" name="date_expiration" value="{{ old('date_expiration') }}" required>
        </div>

        <button type="submit">Create Stream</button>
        <a href="{{ route('dashboard') }}">Cancel</a>
    </form>
</body>
</html>
