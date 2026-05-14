<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - The Silken Manuscript</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Lora:ital@0;1&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 40px 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-family: 'Lora', serif;
            color: #ead9ae;

            background:
                radial-gradient(circle at center, rgba(122, 87, 42, 0.16), transparent 42%),
                radial-gradient(circle at top, rgba(212, 175, 55, 0.07), transparent 35%),
                linear-gradient(135deg, #070403 0%, #1a0f0d 45%, #040202 100%);

            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url("https://www.transparenttextures.com/patterns/dark-wood.png");
            opacity: 0.35;
            pointer-events: none;
            z-index: -2;
        }

        body::after {
            content: "";
            position: fixed;
            inset: 0;
            background: radial-gradient(circle at center, transparent 40%, rgba(0, 0, 0, 0.68) 100%);
            pointer-events: none;
            z-index: -1;
        }

        .reset-container {
            width: 100%;
            max-width: 520px;
            position: relative;

            padding: 58px 52px 50px;

            text-align: center;

            background:
                linear-gradient(145deg, rgba(42, 18, 10, 0.96), rgba(8, 4, 3, 0.98)),
                url("https://www.transparenttextures.com/patterns/leather.png");

            border: 1px solid rgba(212, 175, 55, 0.34);
            border-radius: 12px;

            box-shadow:
                0 45px 100px rgba(0, 0, 0, 0.92),
                0 18px 35px rgba(0, 0, 0, 0.76),
                inset 0 0 28px rgba(212, 175, 55, 0.06),
                inset 0 0 70px rgba(0, 0, 0, 0.58);

            overflow: hidden;
        }

        .reset-container::before {
            content: "";
            position: absolute;
            inset: 10px;

            border: 1px double rgba(212, 175, 55, 0.22);
            border-radius: 8px;

            pointer-events: none;
            z-index: 2;
        }

        .reset-container::after {
            content: "";
            position: absolute;
            top: -130px;
            left: 50%;

            width: 280px;
            height: 280px;

            background: radial-gradient(circle, rgba(212, 175, 55, 0.13), transparent 66%);
            transform: translateX(-50%);

            pointer-events: none;
            z-index: 1;
        }

        .reset-container > * {
            position: relative;
            z-index: 3;
        }

        .reader-icon {
            width: 72px;
            height: 72px;

            margin: 0 auto 22px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background:
                radial-gradient(circle at 35% 30%, #7a2416, #351008 62%, #160604 100%);

            border: 1px solid rgba(212, 175, 55, 0.58);

            box-shadow:
                0 10px 24px rgba(0, 0, 0, 0.65),
                inset 0 0 12px rgba(255, 226, 150, 0.12),
                0 0 20px rgba(212, 175, 55, 0.12);

            color: #d4af37;
            font-size: 1.9rem;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.85);
        }

        h2 {
            margin: 0;

            font-family: 'Playfair Display', serif;
            color: #d4af37;

            font-size: 2.05rem;
            line-height: 1.1;

            text-transform: uppercase;
            letter-spacing: 4px;

            text-shadow:
                0 4px 14px rgba(0, 0, 0, 0.95),
                0 0 18px rgba(212, 175, 55, 0.12);
        }

        .subtitle {
            margin: 14px auto 0;
            max-width: 370px;

            color: #a88c35;
            font-size: 0.95rem;
            font-style: italic;
            line-height: 1.6;
        }

        .seal-decoration {
            width: 90px;
            height: 1px;

            margin: 28px auto 36px;

            background:
                linear-gradient(90deg,
                    transparent,
                    rgba(212, 175, 55, 0.85),
                    rgba(255, 238, 170, 0.75),
                    rgba(212, 175, 55, 0.85),
                    transparent);

            box-shadow: 0 0 12px rgba(212, 175, 55, 0.35);
        }

        form {
            width: 100%;
        }

        .input-group {
            text-align: left;
            margin-bottom: 20px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 9px;

            color: #b99b3a;

            font-size: 0.74rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 2px;
        }

        input {
            width: 100%;

            padding: 15px 15px;

            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.46), rgba(255, 255, 255, 0.025));

            border: 1px solid rgba(212, 175, 55, 0.24);
            border-radius: 4px;

            color: #ead9ae;

            font-family: 'Lora', serif;
            font-size: 0.98rem;

            box-shadow:
                inset 0 0 14px rgba(0, 0, 0, 0.42),
                0 8px 18px rgba(0, 0, 0, 0.24);

            transition:
                border-color 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        input::placeholder {
            color: rgba(234, 217, 174, 0.36);
            font-style: italic;
        }

        input:focus {
            outline: none;

            border-color: rgba(212, 175, 55, 0.85);

            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.54), rgba(212, 175, 55, 0.045));

            box-shadow:
                inset 0 0 14px rgba(0, 0, 0, 0.46),
                0 0 0 3px rgba(212, 175, 55, 0.07),
                0 0 22px rgba(212, 175, 55, 0.12);
        }

        .error-message {
            margin-top: 8px;

            color: #ff8a8a;
            font-size: 0.78rem;
            font-style: italic;

            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.75);
        }

        button {
            width: 100%;
            position: relative;

            margin-top: 18px;
            padding: 18px 20px;

            background:
                linear-gradient(145deg, #5b1414 0%, #2c0707 55%, #140303 100%);

            border: 1px solid rgba(212, 175, 55, 0.85);
            border-radius: 4px;

            color: #d4af37;

            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 3px;

            cursor: pointer;

            box-shadow:
                0 12px 28px rgba(0, 0, 0, 0.55),
                inset 0 0 12px rgba(212, 175, 55, 0.07);

            transition:
                transform 0.25s ease,
                background 0.25s ease,
                color 0.25s ease,
                box-shadow 0.25s ease;
        }

        button::before {
            content: "";
            position: absolute;
            inset: 5px;

            border: 1px solid rgba(212, 175, 55, 0.28);
            border-radius: 2px;

            pointer-events: none;
        }

        button:hover {
            transform: translateY(-2px);

            background:
                linear-gradient(145deg, #d4af37 0%, #9f7f25 100%);

            color: #160908;

            box-shadow:
                0 16px 34px rgba(0, 0, 0, 0.66),
                0 0 24px rgba(212, 175, 55, 0.22);
        }

        .bottom-link {
            margin-top: 28px;

            font-size: 0.88rem;
            font-style: italic;
            color: rgba(234, 217, 174, 0.74);
        }

        .bottom-link a {
            color: #9f842e;
            text-decoration: none;

            transition:
                color 0.25s ease,
                text-shadow 0.25s ease;
        }

        .bottom-link a:hover {
            color: #d4af37;
            text-shadow: 0 0 12px rgba(212, 175, 55, 0.22);
        }

        @media (max-width: 560px) {
            body {
                padding: 28px 16px;
            }

            .reset-container {
                padding: 50px 28px 42px;
            }

            h2 {
                font-size: 1.65rem;
                letter-spacing: 3px;
            }

            .subtitle {
                font-size: 0.88rem;
            }

            button {
                font-size: 0.9rem;
                letter-spacing: 2px;
            }
        }
    </style>
</head>

<body>
    <div class="reset-container">
        <div class="reader-icon">✧</div>

        <h2>Reset Password</h2>

        <p class="subtitle">
            Create a new key to reopen your place inside the archive.
        </p>

        <div class="seal-decoration"></div>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="input-group">
                <label for="email">Email Address</label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email', $request->email) }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="email@example.com"
                >

                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label for="password">New Password</label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="••••••••"
                >

                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirm New Password</label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="••••••••"
                >

                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">
                Reset Password
            </button>
        </form>

        <div class="bottom-link">
            <a href="{{ route('login') }}">Return to login.</a>
        </div>
    </div>
</body>
</html>