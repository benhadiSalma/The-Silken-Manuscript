<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - The Silken Manuscript</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Lora:ital@0;1&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

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

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url("https://www.transparenttextures.com/patterns/dark-wood.png");
            opacity: 0.32;
            pointer-events: none;
            z-index: -1;
        }

        .faq-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .faq-header {
            text-align: center;
            margin-bottom: 48px;
        }

        .faq-kicker {
            color: #9f842e;
            font-family: 'Playfair Display', serif;
            font-size: 0.85rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 12px;
        }

        h1 {
            margin: 0;
            color: #d4af37;
            font-family: 'Playfair Display', serif;
            font-size: 3.2rem;
            text-transform: uppercase;
            letter-spacing: 5px;
            text-shadow: 0 4px 16px rgba(0, 0, 0, 0.95);
        }

        .subtitle {
            margin-top: 14px;
            color: #9f842e;
            font-style: italic;
        }

        .success-message {
            margin-bottom: 28px;
            padding: 14px 18px;
            background: rgba(212, 175, 55, 0.12);
            border: 1px solid rgba(212, 175, 55, 0.32);
            border-radius: 8px;
            color: #d4af37;
            text-align: center;
        }

        .admin-actions {
            display: flex;
            justify-content: center;
            margin-bottom: 32px;
        }

        .gold-btn,
        .danger-btn,
        .soft-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 18px;
            border-radius: 999px;
            font-family: 'Playfair Display', serif;
            font-size: 0.78rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.4px;
            text-decoration: none;
            cursor: pointer;
        }

        .gold-btn {
            background: linear-gradient(145deg, #7a2021 0%, #4a1011 100%);
            color: #f5eedc;
            border: 1px solid rgba(212, 175, 55, 0.45);
        }

        .danger-btn {
            background: transparent;
            color: #ff9a9a;
            border: 1px solid rgba(255, 120, 120, 0.35);
        }

        .soft-link {
            color: #d4af37;
            border: 1px solid rgba(212, 175, 55, 0.25);
            background: rgba(0, 0, 0, 0.2);
        }

        .faq-grid {
            display: grid;
            gap: 30px;
        }

        .category-card {
            padding: 30px;
            background:
                linear-gradient(145deg, rgba(20, 10, 8, 0.96), rgba(8, 4, 3, 0.98)),
                url("https://www.transparenttextures.com/patterns/leather.png");
            border: 1px solid rgba(212, 175, 55, 0.28);
            border-radius: 14px;
            box-shadow: 0 24px 55px rgba(0, 0, 0, 0.72);
        }

        .category-title {
            margin: 0 0 22px;
            color: #d4af37;
            font-family: 'Playfair Display', serif;
            font-size: 1.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .faq-item {
            padding: 18px 0;
            border-top: 1px solid rgba(212, 175, 55, 0.12);
        }

        .faq-item:first-of-type {
            border-top: none;
            padding-top: 0;
        }

        .faq-question {
            margin: 0 0 10px;
            color: #f5eedc;
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }

        .faq-answer {
            margin: 0;
            color: rgba(234, 217, 174, 0.82);
            line-height: 1.75;
        }

        .faq-admin-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 14px;
        }

        .empty-state {
            text-align: center;
            padding: 60px 30px;
            border: 1px dashed rgba(212, 175, 55, 0.25);
            border-radius: 12px;
            color: #9f842e;
            font-style: italic;
        }

        .bottom-links {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-top: 42px;
        }

        @media (max-width: 700px) {
            body {
                padding: 42px 16px;
            }

            h1 {
                font-size: 2.3rem;
            }

            .category-card {
                padding: 24px 20px;
            }
        }
    </style>
</head>
<body>
    <main class="faq-container">
        <header class="faq-header">
            <div class="faq-kicker">Reader Assistance</div>
            <h1>FAQ</h1>
            <div class="subtitle">Questions and answers from the archive.</div>
        </header>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @auth
            @if(auth()->user()->is_admin)
                <div class="admin-actions">
                    <a href="{{ route('admin.faqs.create') }}" class="gold-btn">
                        Add FAQ Item
                    </a>
                </div>
            @endif
        @endauth

        <section class="faq-grid">
            @forelse($faqs as $category => $items)
                <article class="category-card">
                    <h2 class="category-title">{{ $category }}</h2>

                    @foreach($items as $faq)
                        <div class="faq-item">
                            <h3 class="faq-question">{{ $faq->question }}</h3>
                            <p class="faq-answer">{{ $faq->answer }}</p>

                            @auth
                                @if(auth()->user()->is_admin)
                                    <div class="faq-admin-row">
                                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="soft-link">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" onsubmit="return confirm('Delete this FAQ item?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="danger-btn">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    @endforeach
                </article>
            @empty
                <div class="empty-state">
                    No FAQ items have been written yet.
                </div>
            @endforelse
        </section>

        <div class="bottom-links">
            <a href="{{ route('index') }}" class="soft-link">
                Return to Archives
            </a>

            <a href="{{ route('rules.index') }}" class="soft-link">
                Read Rules
            </a>
        </div>
    </main>
</body>
</html>