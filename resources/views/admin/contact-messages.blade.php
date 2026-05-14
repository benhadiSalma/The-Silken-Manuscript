<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Messages - The Silken Manuscript</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Lora:ital@0;1&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 70px 24px;
            background:
                radial-gradient(circle at top, rgba(212, 175, 55, 0.16), transparent 34%),
                radial-gradient(circle at center, rgba(122, 32, 33, 0.1), transparent 52%),
                linear-gradient(135deg, #050302 0%, #160d0b 45%, #030202 100%);
            color: #d4b16a;
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

        .messages-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .page-header {
            text-align: center;
            margin-bottom: 45px;
        }

        .kicker {
            margin-bottom: 12px;
            color: #9b2b2b;
            font-family: 'Playfair Display', serif;
            font-size: 0.82rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 4px;
        }

        h1 {
            margin: 0;
            color: #d4b16a;
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            text-transform: uppercase;
            letter-spacing: 4px;
            text-shadow:
                0 4px 14px rgba(0, 0, 0, 0.9),
                0 0 16px rgba(212, 175, 55, 0.14);
        }

        .subtitle {
            max-width: 620px;
            margin: 18px auto 0;
            color: rgba(234, 217, 174, 0.78);
            font-size: 1rem;
            font-style: italic;
            line-height: 1.7;
        }

        .success-message {
            margin: 0 auto 30px;
            max-width: 800px;
            padding: 16px 20px;
            background: rgba(212, 175, 55, 0.12);
            border: 1px solid rgba(212, 175, 55, 0.32);
            border-radius: 10px;
            color: #f5eedc;
            text-align: center;
        }

        .top-actions {
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 32px;
        }

        .nav-btn,
        .read-btn,
        .delete-btn {
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

        .nav-btn {
            background:
                radial-gradient(circle at 35% 30%, #9b2b2b, #5a1111 68%, #250505 100%);
            color: #f5df9d;
            border: 1px solid rgba(212, 175, 55, 0.48);
        }

        .messages-list {
            display: grid;
            gap: 24px;
        }

        .message-card {
            position: relative;

            padding: 30px;

            background:
                linear-gradient(145deg, rgba(20, 10, 8, 0.97), rgba(8, 4, 3, 0.99)),
                url("https://www.transparenttextures.com/patterns/leather.png");

            border: 1px solid rgba(212, 177, 106, 0.28);
            border-radius: 16px;

            box-shadow:
                0 24px 55px rgba(0, 0, 0, 0.76),
                inset 0 0 26px rgba(212, 175, 55, 0.035);

            overflow: hidden;
        }

        .message-card.unread {
            border-color: rgba(212, 175, 55, 0.62);
            box-shadow:
                0 28px 65px rgba(0, 0, 0, 0.82),
                0 0 18px rgba(212, 175, 55, 0.12),
                inset 0 0 26px rgba(212, 175, 55, 0.05);
        }

        .message-card::before {
            content: "";
            position: absolute;
            inset: 12px;
            border: 1px double rgba(212, 175, 55, 0.14);
            border-radius: 11px;
            pointer-events: none;
        }

        .message-content {
            position: relative;
            z-index: 2;
        }

        .message-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .message-status {
            display: inline-flex;
            padding: 6px 12px;
            border-radius: 999px;

            font-family: 'Playfair Display', serif;
            font-size: 0.72rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.4px;
        }

        .status-unread {
            background: rgba(212, 175, 55, 0.14);
            color: #d4af37;
            border: 1px solid rgba(212, 175, 55, 0.38);
        }

        .status-read {
            background: rgba(255, 255, 255, 0.04);
            color: rgba(234, 217, 174, 0.6);
            border: 1px solid rgba(234, 217, 174, 0.14);
        }

        .message-subject {
            margin: 0 0 8px;
            color: #d4b16a;
            font-family: 'Playfair Display', serif;
            font-size: 1.45rem;
            text-transform: uppercase;
            letter-spacing: 1.8px;
        }

        .message-meta {
            color: rgba(234, 217, 174, 0.72);
            font-size: 0.92rem;
            line-height: 1.7;
        }

        .message-meta a {
            color: #d4af37;
            text-decoration: none;
        }

        .message-body {
            margin-top: 20px;
            padding: 20px;

            background: rgba(10, 5, 4, 0.62);
            border: 1px solid rgba(212, 175, 55, 0.14);
            border-radius: 10px;

            color: rgba(245, 238, 220, 0.88);
            line-height: 1.8;
            white-space: pre-line;
        }

        .message-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .read-btn {
            background: rgba(212, 175, 55, 0.12);
            color: #d4af37;
            border: 1px solid rgba(212, 175, 55, 0.34);
        }

        .delete-btn {
            background: transparent;
            color: #ff9a9a;
            border: 1px solid rgba(255, 120, 120, 0.35);
        }

        .empty-state {
            padding: 65px 30px;
            text-align: center;

            background:
                linear-gradient(145deg, rgba(20, 10, 8, 0.92), rgba(8, 4, 3, 0.97));

            border: 1px dashed rgba(212, 175, 55, 0.28);
            border-radius: 16px;

            color: #9f842e;
            font-style: italic;

            box-shadow: 0 22px 50px rgba(0, 0, 0, 0.65);
        }

        form {
            margin: 0;
        }

        button {
            font-family: inherit;
        }

        @media (max-width: 720px) {
            body {
                padding: 48px 16px;
            }

            h1 {
                font-size: 2rem;
                letter-spacing: 2.5px;
            }

            .message-card {
                padding: 24px 20px;
            }

            .message-top {
                display: grid;
            }
        }
    </style>
</head>

<body>
    <main class="messages-container">
        <header class="page-header">
            <div class="kicker">Curator Correspondence</div>

            <h1>Contact Messages</h1>

            <p class="subtitle">
                Messages sent by readers and visitors through the public contact form.
            </p>
        </header>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="top-actions">
            <a href="{{ route('admin.dashboard') }}" class="nav-btn">
                Return to Command Chamber
            </a>

            <a href="{{ route('contact.create') }}" class="nav-btn">
                Public Contact Page
            </a>
        </div>

        <section class="messages-list">
            @forelse($messages as $message)
                <article class="message-card {{ $message->is_read ? '' : 'unread' }}">
                    <div class="message-content">
                        <div class="message-top">
                            <div>
                                <h2 class="message-subject">
                                    {{ $message->subject }}
                                </h2>

                                <div class="message-meta">
                                    From <strong>{{ $message->name }}</strong><br>
                                    <a href="mailto:{{ $message->email }}">{{ $message->email }}</a><br>
                                    Sent {{ $message->created_at->format('d/m/Y H:i') }}
                                </div>
                            </div>

                            @if($message->is_read)
                                <span class="message-status status-read">
                                    Read
                                </span>
                            @else
                                <span class="message-status status-unread">
                                    New
                                </span>
                            @endif
                        </div>

                        <div class="message-body">
                            {{ $message->message }}
                        </div>

                        <div class="message-actions">
                            @if(!$message->is_read)
                                <form action="{{ route('admin.contact-messages.read', $message) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <button type="submit" class="read-btn">
                                        Mark as Read
                                    </button>
                                </form>
                            @endif

                            <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this contact message?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete-btn">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty-state">
                    No contact messages have been received yet.
                </div>
            @endforelse
        </section>
    </main>
</body>
</html>