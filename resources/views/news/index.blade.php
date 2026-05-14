<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chronicles - The Silken Manuscript</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Lora:ital@0;1&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background:
                radial-gradient(circle at top, rgba(212, 175, 55, 0.14), transparent 35%),
                linear-gradient(135deg, #070403 0%, #160d0b 45%, #030202 100%);
            color: #ead9ae;
            font-family: 'Lora', serif;
            padding: 60px 24px;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url("https://www.transparenttextures.com/patterns/dark-wood.png");
            opacity: 0.32;
            pointer-events: none;
            z-index: -1;
        }

        .chronicles-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .page-header {
            text-align: center;
            margin-bottom: 50px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            color: #d4af37;
            font-size: 3rem;
            text-transform: uppercase;
            letter-spacing: 5px;
            margin: 0;
        }

        .subtitle {
            color: #9f842e;
            font-style: italic;
            margin-top: 12px;
        }

        .success-message {
            background: rgba(212, 175, 55, 0.12);
            border: 1px solid rgba(212, 175, 55, 0.35);
            color: #d4af37;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
        }

        .chronicle-list {
            display: grid;
            gap: 28px;
        }

        .chronicle-card {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 28px;
            padding: 26px;
            background: linear-gradient(145deg, rgba(20, 10, 8, 0.96), rgba(8, 4, 3, 0.98));
            border: 1px solid rgba(212, 175, 55, 0.28);
            border-radius: 14px;
            box-shadow: 0 24px 55px rgba(0,0,0,0.72);
        }

        .chronicle-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid rgba(212, 175, 55, 0.32);
            background: #160907;
        }

        .chronicle-placeholder {
            width: 100%;
            height: 180px;
            border-radius: 10px;
            border: 1px solid rgba(212, 175, 55, 0.32);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #d4af37;
            font-size: 2.5rem;
            background: #160907;
        }

        .chronicle-title {
            font-family: 'Playfair Display', serif;
            color: #d4af37;
            font-size: 1.7rem;
            margin: 0 0 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .chronicle-date {
            color: #9f842e;
            font-size: 0.85rem;
            font-style: italic;
            margin-bottom: 14px;
        }

        .chronicle-excerpt {
            color: #ead9ae;
            line-height: 1.7;
            margin-bottom: 18px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
        }

        .link-btn,
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

        .empty-state {
            text-align: center;
            padding: 60px 30px;
            border: 1px dashed rgba(212, 175, 55, 0.25);
            border-radius: 12px;
            color: #9f842e;
            font-style: italic;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 40px;
            color: #d4af37;
            text-decoration: none;
            font-style: italic;
        }

        @media (max-width: 760px) {
            .chronicle-card {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="chronicles-container">
        <div class="page-header">
            <h1>Chronicles</h1>
            <div class="subtitle">Official decrees from The Silken Manuscript.</div>
        </div>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="chronicle-list">
            @forelse($newsItems as $news)
                <article class="chronicle-card">
                    <div>
                        @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="chronicle-image">
                        @else
                            <div class="chronicle-placeholder">✦</div>
                        @endif
                    </div>

                    <div>
                        <h2 class="chronicle-title">{{ $news->title }}</h2>

                        <div class="chronicle-date">
                            Published {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}
                        </div>

                        <p class="chronicle-excerpt">
                            {{ Str::limit($news->content, 220) }}
                        </p>

                        <div class="actions">
                            <a href="{{ route('news.show', $news) }}" class="link-btn">
                                Read Chronicle
                            </a>

                            @auth
                                @if(auth()->user()->is_admin)
                                    <a href="{{ route('admin.news.edit', $news) }}" class="link-btn">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.news.destroy', $news) }}" method="POST" onsubmit="return confirm('Delete this chronicle?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty-state">
                    No chronicles have been published yet.
                </div>
            @endforelse
        </div>

        <a href="{{ route('index') }}" class="back-link">
            ← Return to Archives
        </a>
    </div>
</body>
</html>