<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - The Silken Manuscript</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Lora:ital@0;1&display=swap"
        rel="stylesheet">

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

        .contact-card {
            max-width: 850px;
            margin: 0 auto;
            padding: 54px;
            background:
                linear-gradient(145deg, rgba(20, 10, 8, 0.97), rgba(8, 4, 3, 0.99)),
                url("https://www.transparenttextures.com/patterns/leather.png");
            border: 1px solid rgba(212, 177, 106, 0.38);
            border-radius: 16px;
            box-shadow:
                0 36px 90px rgba(0, 0, 0, 0.9),
                inset 0 0 34px rgba(212, 175, 55, 0.04);
            position: relative;
        }

        .contact-card::before {
            content: "";
            position: absolute;
            inset: 14px;
            border: 1px double rgba(212, 177, 106, 0.22);
            border-radius: 12px;
            pointer-events: none;
        }

        .contact-header,
        .contact-form {
            position: relative;
            z-index: 2;
        }

        .contact-header {
            text-align: center;
            margin-bottom: 38px;
        }

        .contact-kicker {
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
            max-width: 580px;
            margin: 18px auto 0;
            color: rgba(234, 217, 174, 0.78);
            font-size: 1rem;
            font-style: italic;
            line-height: 1.7;
        }

        .success-message {
            margin-bottom: 28px;
            padding: 18px 20px;

            background:
                linear-gradient(145deg, rgba(212, 175, 55, 0.14), rgba(122, 32, 33, 0.08));

            border: 1px solid rgba(212, 175, 55, 0.42);
            border-radius: 10px;

            color: #f5eedc;
            text-align: center;

            box-shadow:
                0 12px 28px rgba(0, 0, 0, 0.45),
                inset 0 0 18px rgba(212, 175, 55, 0.04);

            position: relative;
            z-index: 2;
        }

        .success-message strong {
            display: block;
            margin-bottom: 6px;

            color: #d4af37;

            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .success-message p {
            margin: 0;
            color: rgba(234, 217, 174, 0.82);
            font-style: italic;
            line-height: 1.6;
        }

        .contact-form {
            display: grid;
            gap: 22px;
        }

        .form-group {
            display: grid;
            gap: 8px;
        }

        label {
            color: #d6b85a;
            font-family: 'Playfair Display', serif;
            font-size: 0.95rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.7px;
        }

        input,
        textarea {
            width: 100%;
            padding: 14px 15px;
            background: rgba(10, 5, 4, 0.88);
            border: 1px solid rgba(212, 177, 106, 0.38);
            border-radius: 7px;
            color: #f5eedc;
            font-family: 'Lora', serif;
            font-size: 1rem;
            outline: none;
            box-shadow:
                inset 0 3px 8px rgba(0, 0, 0, 0.58),
                0 0 0 rgba(212, 175, 55, 0);
        }

        textarea {
            min-height: 210px;
            resize: vertical;
            line-height: 1.7;
        }

        input:focus,
        textarea:focus {
            border-color: rgba(212, 177, 106, 0.85);
            box-shadow:
                inset 0 3px 8px rgba(0, 0, 0, 0.58),
                0 0 18px rgba(212, 175, 55, 0.1);
        }

        .error-message {
            color: #ff8a8a;
            font-size: 0.85rem;
            font-style: italic;
        }

        .submit-btn {
            width: 100%;
            padding: 16px 22px;
            background:
                radial-gradient(circle at 35% 30%, #d9bc68, #b88a35 62%, #6f4517 100%);
            color: #1a0f0f;
            border: 1px solid rgba(255, 230, 150, 0.72);
            border-radius: 999px;
            font-family: 'Playfair Display', serif;
            font-size: 0.95rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            box-shadow:
                0 12px 24px rgba(0, 0, 0, 0.55),
                inset 0 0 12px rgba(255, 248, 210, 0.18);
        }

        .submit-btn:hover {
            filter: brightness(1.06);
        }

        .bottom-links {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-top: 28px;
        }

        .bottom-links a {
            color: #d4b16a;
            text-decoration: none;
            font-style: italic;
        }

        .bottom-links a:hover {
            color: #f5df9d;
        }

        @media (max-width: 720px) {
            body {
                padding: 45px 16px;
            }

            .contact-card {
                padding: 42px 26px;
            }

            h1 {
                font-size: 2rem;
                letter-spacing: 2.5px;
            }
        }
    </style>
</head>

<body>
    <main class="contact-card">
        <header class="contact-header">
            <div class="contact-kicker">Reader Correspondence</div>

            <h1>Contact the Archive</h1>

            <p class="subtitle">
                Send a message to the curators of The Silken Manuscript. Your request will be preserved and forwarded to
                the archive administration.
            </p>
        </header>

        @if(session('success'))
            <div class="success-message">
                <strong>Message sent.</strong>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
            @csrf

            <div class="form-group">
                <label for="name">Your Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required maxlength="255"
                    placeholder="Your name...">

                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Your Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required maxlength="255"
                    placeholder="email@example.com">

                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input id="subject" type="text" name="subject" value="{{ old('subject') }}" required maxlength="255"
                    placeholder="What is your message about?">

                @error('subject')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required maxlength="3000"
                    placeholder="Write your message here...">{{ old('message') }}</textarea>

                @error('message')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="submit-btn">
                Send Message
            </button>
        </form>

        <div class="bottom-links">
            <a href="{{ route('index') }}">← Return to Archives</a>
            <a href="{{ route('faq.index') }}">Open FAQ</a>
        </div>
    </main>
</body>

</html>