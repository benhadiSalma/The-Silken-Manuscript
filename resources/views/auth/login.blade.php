<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Archives - Break the Seal</title>

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
                radial-gradient(circle at center, rgba(122, 87, 42, 0.15), transparent 42%),
                radial-gradient(circle at top, rgba(212, 175, 55, 0.08), transparent 35%),
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

            background:
                radial-gradient(circle at center, transparent 38%, rgba(0, 0, 0, 0.68) 100%);

            pointer-events: none;
            z-index: -1;
        }

        .gatekeeper-container {
            width: 100%;
            max-width: 460px;
            position: relative;

            padding: 64px 52px 54px;

            text-align: center;

            background:
                linear-gradient(145deg, rgba(45, 18, 10, 0.96), rgba(9, 4, 3, 0.98)),
                url("https://www.transparenttextures.com/patterns/leather.png");

            border: 1px solid rgba(212, 175, 55, 0.34);
            border-radius: 10px;

            box-shadow:
                0 45px 100px rgba(0, 0, 0, 0.92),
                0 18px 35px rgba(0, 0, 0, 0.76),
                inset 0 0 28px rgba(212, 175, 55, 0.06),
                inset 0 0 70px rgba(0, 0, 0, 0.58);

            overflow: hidden;
        }

        .gatekeeper-container::before {
            content: "";
            position: absolute;
            inset: 10px;

            border: 1px double rgba(212, 175, 55, 0.22);
            border-radius: 6px;

            box-shadow:
                inset 0 0 16px rgba(212, 175, 55, 0.05),
                0 0 12px rgba(212, 175, 55, 0.04);

            pointer-events: none;
            z-index: 2;
        }

        .gatekeeper-container::after {
            content: "";
            position: absolute;
            top: -120px;
            left: 50%;

            width: 260px;
            height: 260px;

            background: radial-gradient(circle, rgba(212, 175, 55, 0.12), transparent 65%);
            transform: translateX(-50%);

            pointer-events: none;
            z-index: 1;
        }

        .gatekeeper-container > * {
            position: relative;
            z-index: 3;
        }

        .seal-icon {
            width: 74px;
            height: 74px;

            margin: 0 auto 24px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background:
                radial-gradient(circle at 35% 30%, #7b1d1d, #3a0707 62%, #180303 100%);

            border: 1px solid rgba(212, 175, 55, 0.62);

            box-shadow:
                0 10px 24px rgba(0, 0, 0, 0.65),
                inset 0 0 12px rgba(255, 226, 150, 0.12),
                0 0 20px rgba(212, 175, 55, 0.12);

            color: #d4af37;
            font-size: 2rem;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.85);
        }

        h2 {
            margin: 0;

            font-family: 'Playfair Display', serif;
            color: #d4af37;

            font-size: 2.25rem;
            line-height: 1.1;

            text-transform: uppercase;
            letter-spacing: 5px;

            text-shadow:
                0 4px 14px rgba(0, 0, 0, 0.95),
                0 0 18px rgba(212, 175, 55, 0.12);
        }

        .subtitle {
            margin-top: 14px;

            color: #9f842e;
            font-size: 0.95rem;
            font-style: italic;
            line-height: 1.6;
        }

        .seal-decoration {
            width: 88px;
            height: 1px;

            margin: 28px auto 38px;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(212, 175, 55, 0.85),
                    rgba(255, 238, 170, 0.75),
                    rgba(212, 175, 55, 0.85),
                    transparent
                );

            box-shadow: 0 0 12px rgba(212, 175, 55, 0.35);
        }

        form {
            width: 100%;
        }

        .input-group {
            text-align: left;
            margin-bottom: 24px;
            position: relative;
        }

        label {
            display: block;

            margin-bottom: 10px;

            color: #b99b3a;

            font-size: 0.76rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 2px;
        }

        input {
            width: 100%;

            padding: 16px 15px;

            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.46), rgba(255, 255, 255, 0.025));

            border: 1px solid rgba(212, 175, 55, 0.24);
            border-radius: 4px;

            color: #ead9ae;

            font-family: 'Lora', serif;
            font-size: 1rem;

            box-shadow:
                inset 0 0 14px rgba(0, 0, 0, 0.42),
                0 8px 18px rgba(0, 0, 0, 0.25);

            transition:
                border-color 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        input::placeholder {
            color: rgba(234, 217, 174, 0.38);
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

        button {
            width: 100%;
            position: relative;

            margin-top: 16px;
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

        button:active {
            transform: translateY(0);
        }

        .auth-links {
            margin-top: 30px;

            font-size: 0.88rem;
            font-style: italic;
        }

        .auth-links a {
            color: #9f842e;
            text-decoration: none;

            transition:
                color 0.25s ease,
                text-shadow 0.25s ease;
        }

        .auth-links a:hover {
            color: #d4af37;
            text-shadow: 0 0 12px rgba(212, 175, 55, 0.22);
        }

        .error-message {
            margin-top: 8px;

            color: #ff8a8a;
            font-size: 0.8rem;
            font-style: italic;

            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.75);
        }

        @media (max-width: 520px) {
            body {
                padding: 28px 16px;
            }

            .gatekeeper-container {
                padding: 54px 28px 44px;
            }

            h2 {
                font-size: 1.85rem;
                letter-spacing: 3px;
            }

            .subtitle {
                font-size: 0.88rem;
            }

            button {
                font-size: 0.92rem;
                letter-spacing: 2px;
            }
        }
    </style>
</head>

<body>

    <div class="gatekeeper-container">
        <div class="seal-icon">✦</div>

        <h2>Break the Seal</h2>

        <p class="subtitle">
            Enter your credentials to unlock the hidden archive.
        </p>

        <div class="seal-decoration"></div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <label for="email">Scribe's Identifier</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                    placeholder="email@ehb.be"
                >

                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label for="password">Secret Incantation</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    placeholder="••••••••"
                >

                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Unlock the Vault</button>

            <div class="auth-links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgotten lore?</a>
                @endif
            </div>
        </form>
    </div>

</body>
</html>
