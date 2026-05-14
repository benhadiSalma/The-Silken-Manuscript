<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create FAQ - The Silken Manuscript</title>

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
        textarea {
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
            min-height: 190px;
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
        <h1>Create FAQ Item</h1>
        <p class="subtitle">Add a new question and answer to the public archive help page.</p>

        <form action="{{ route('admin.faqs.store') }}" method="POST">
            @csrf

            <div>
                <label for="category">Category</label>
                <input id="category" type="text" name="category" value="{{ old('category') }}" required placeholder="Account, Profile, Chronicles...">
                @error('category')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="question">Question</label>
                <input id="question" type="text" name="question" value="{{ old('question') }}" required>
                @error('question')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="answer">Answer</label>
                <textarea id="answer" name="answer" required>{{ old('answer') }}</textarea>
                @error('answer')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">
                Save FAQ Item
            </button>

            <a href="{{ route('faq.index') }}" class="back-link">
                ← Back to FAQ
            </a>
        </form>
    </main>
</body>
</html>