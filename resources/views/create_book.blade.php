<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Manuscript - The Silken Manuscript</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Lora:ital@0;1&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 70px 24px;
            background:
                radial-gradient(circle at top, rgba(212, 175, 55, 0.16), transparent 34%),
                linear-gradient(135deg, #050302 0%, #160d0b 45%, #030202 100%);
            color: #d4b16a;
            font-family: 'Lora', serif;
        }

        .card {
            max-width: 820px;
            margin: 0 auto;
            padding: 52px;
            background: linear-gradient(145deg, rgba(20, 10, 8, 0.97), rgba(8, 4, 3, 0.99));
            border: 1px solid rgba(212, 177, 106, 0.38);
            border-radius: 16px;
            box-shadow: 0 36px 90px rgba(0, 0, 0, 0.9);
        }

        h1 {
            margin: 0 0 12px;
            font-family: 'Playfair Display', serif;
            color: #d4b16a;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-align: center;
        }

        .subtitle {
            margin: 0 0 34px;
            text-align: center;
            color: rgba(234, 217, 174, 0.74);
            font-style: italic;
        }

        form {
            display: grid;
            gap: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-family: 'Playfair Display', serif;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 14px;
            background: rgba(10, 5, 4, 0.88);
            border: 1px solid rgba(212, 177, 106, 0.38);
            border-radius: 6px;
            color: #f5eedc;
            font-family: 'Lora', serif;
            font-size: 1rem;
            outline: none;
        }

        textarea {
            min-height: 170px;
            resize: vertical;
            line-height: 1.7;
        }

        .error {
            margin-top: 7px;
            color: #ff8a8a;
            font-size: 0.85rem;
            font-style: italic;
        }

        .btn {
            padding: 15px;
            background: #d4b16a;
            color: #1a0f0f;
            border: none;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-family: 'Playfair Display', serif;
            border-radius: 999px;
        }

        .back-link {
            text-align: center;
            color: #d4b16a;
            text-decoration: none;
            font-style: italic;
        }
    </style>
</head>
<body>
    <main class="card">
        <h1>Add New Manuscript</h1>
        <p class="subtitle">Create a new book record inside the archive.</p>

        <form action="{{ route('admin.books.store') }}" method="POST">
            @csrf

            <div>
                <label for="title">Title</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="author">Author</label>
                <input id="author" type="text" name="author" value="{{ old('author') }}" required>
                @error('author')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="genre">Genre</label>
                <select id="genre" name="genre" required>
                    <option value="">Choose a genre</option>
                    <option value="Romance">Romance</option>
                    <option value="Romantasy">Romantasy</option>
                    <option value="Dark Academia">Dark Academia</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Manhwa">Manhwa</option>
                </select>
                @error('genre')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="synopsis">Synopsis</label>
                <textarea id="synopsis" name="synopsis" required>{{ old('synopsis') }}</textarea>
                @error('synopsis')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">
                Add Manuscript
            </button>

            <a href="{{ route('admin.dashboard') }}" class="back-link">
                ← Return to Command Chamber
            </a>
        </form>
    </main>
</body>
</html>