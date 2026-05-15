<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $news->title }} - Chronicle</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Lora:ital@0;1&display=swap"
        rel="stylesheet">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            padding: 60px 24px;
            background:
                radial-gradient(circle at top, rgba(212, 175, 55, 0.14), transparent 35%),
                linear-gradient(135deg, #070403 0%, #160d0b 45%, #030202 100%);
            color: #ead9ae;
            font-family: 'Lora', serif;
        }

        .container {
            max-width: 850px;
            margin: 0 auto;
            background: linear-gradient(145deg, rgba(20, 10, 8, 0.96), rgba(8, 4, 3, 0.98));
            border: 1px solid rgba(212, 175, 55, 0.28);
            border-radius: 14px;
            padding: 42px;
            box-shadow: 0 24px 55px rgba(0, 0, 0, 0.72);
        }

        h1 {
            font-family: 'Playfair Display', serif;
            color: #d4af37;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin: 0 0 12px;
        }

        .date {
            color: #9f842e;
            font-style: italic;
            margin-bottom: 28px;
        }

        img {
            width: 100%;
            max-height: 420px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid rgba(212, 175, 55, 0.32);
            margin-bottom: 28px;
        }

        .content {
            line-height: 1.9;
            white-space: pre-line;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 32px;
        }

        .btn,
        .delete-btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 999px;
            border: 1px solid rgba(212, 175, 55, 0.45);
            background: #581313;
            color: #f5eedc;
            text-decoration: none;
            font-family: 'Playfair Display', serif;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            font-size: 0.78rem;
            cursor: pointer;
        }

        .delete-btn {
            background: transparent;
            color: #ff9a9a;
            border-color: rgba(255, 120, 120, 0.35);
        }
    </style>
</head>

<body>
    <main class="container">
        <h1>{{ $news->title }}</h1>

        <div class="date">
            Published
            {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}
        </div>

        @if($news->user)
            <div class="date">
                Published by {{ $news->user->getAttribute('username') ?: $news->user->name }}
            </div>
        @endif

        @if($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
        @endif

        <div class="content">
            {{ $news->content }}
        </div>

        <div class="actions">
            <a href="{{ route('news.index') }}" class="btn">
                Back to Chronicles
            </a>

            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.news.edit', $news) }}" class="btn">
                        Edit
                    </a>

                    <form action="{{ route('admin.news.destroy', $news) }}" method="POST"
                        onsubmit="return confirm('Delete this chronicle?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">
                            Delete
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </main>
</body>

</html>