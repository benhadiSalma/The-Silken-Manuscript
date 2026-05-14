<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - The Silken Manuscript</title>

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

        .verify-container {
            width: 100%;
            max-width: 560px;
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

        .verify-container::before {
            content: "";
            position: absolute;
            inset: 10px;

            border: 1px double rgba(212, 175, 55, 0.22);
            border-radius: 8px;

            pointer-events: none;
            z-index: 2;
        }

        .verify-container::after {
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

        .verify-container > * {
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

            font-size: 2rem;
            line-height: 1.1;

            text-transform: uppercase;
            letter-spacing: 4px;

            text-shadow:
                0 4px 14px rgba(0, 0, 0, 0.95),
                0 0 18px rgba(212, 175, 55, 0.12);
        }

        .subtitle {
            margin: 16px auto 0;
            max-width: 410px;

            color: #a88c35;
            font-size: 0.95rem;
            font-style: italic;
            line-height: 1.7;
        }

        .seal-decoration {
            width: 90px;
            height: 1px;

            margin: 28px auto 34px;

            background:
                linear-gradient(90deg,
                    transparent,
                    rgba(212, 175, 55, 0.85),
                    rgba(255, 238, 170, 0.75),
                    rgba(212, 175, 55, 0.85),
                    transparent);

            box-shadow: 0 0 12px rgba(212, 175, 55, 0.35);
        }

        .status-message {
            margin-bottom: 26px;
            padding: 15px 18px;

            background: rgba(212, 175, 55, 0.12);
            border: 1px solid rgba(212, 175, 55, 0.32);
            border-radius: 8px;

            color: #d4af37;
            font-size: 0.9rem;
            font-style: italic;
            line-height: 1.6;
        }

        .actions {
            display: grid;
            gap: 14px;
        }

        button {
            width: 100%;
            position: relative;

            padding: 17px 20px;

            background:
                linear-gradient(145deg, #5b1414 0%, #2c0707 55%, #140303 100%);

            border: 1px solid rgba(212, 175, 55, 0.85);
            border-radius: 4px;

            color: #d4af37;

            font-family: 'Playfair Display', serif;
            font-size: 0.95rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 2.5px;

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

        .logout-button {
            background: transparent;
            border-color: rgba(212, 175, 55, 0.28);
            color: #9f842e;
            box-shadow: none;
        }

        .logout-button:hover {
            background: rgba(212, 175, 55, 0.08);
            color: #d4af37;
            box-shadow: 0 0 14px rgba(212, 175, 55, 0.12);
        }

        @media (max-width: 560px) {
            body {
                padding: 28px 16px;
            }

            .verify-container {
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
                font-size: 0.85rem;
                letter-spacing: 2px;
            }
        }
    </style>
</head>

<body>
    <div class="verify-container">
        <div class="reader-icon">✧</div>

        <h2>Verify Email</h2>

        <p class="subtitle">
            Before entering the archive, confirm your email address by opening the verification link we sent to your inbox.
        </p>

        <div class="seal-decoration"></div>

        @if (session('status') == 'verification-link-sent')
            <div class="status-message">
                A new verification link has been sent to the email address you provided during registration.
            </div>
        @endif

        <div class="actions">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <button type="submit">
                    Resend Verification Email
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout-button">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</body>
</html>