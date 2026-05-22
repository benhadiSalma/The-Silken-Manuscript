<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Archives - The Silken Manuscript</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Lora:ital@0;1&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --gold: #d4af37;
            --soft-gold: #d6b85a;
            --old-gold: #9f842e;
            --cream: #ead9ae;
            --parchment: #f5eedc;
            --dark: #070403;
            --wine: #7a2021;
            --border-gold: rgba(212, 175, 55, 0.32);
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Lora', serif;
            color: var(--cream);
            padding: 0 35px 80px;

            background:
                radial-gradient(circle at top, rgba(173, 124, 54, 0.18), transparent 35%),
                radial-gradient(circle at center, rgba(212, 175, 55, 0.06), transparent 48%),
                linear-gradient(135deg, #070403 0%, #160d0b 45%, #030202 100%);

            background-color: var(--dark);
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url("https://www.transparenttextures.com/patterns/dark-wood.png");
            opacity: 0.34;
            pointer-events: none;
            z-index: -2;
        }

        body::after {
            content: "";
            position: fixed;
            inset: 0;
            background: radial-gradient(circle at center, transparent 42%, rgba(0, 0, 0, 0.72) 100%);
            pointer-events: none;
            z-index: -1;
        }

        .archive-navbar {
            width: calc(100% + 70px);
            margin-left: -35px;
            margin-bottom: 58px;

            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 28px;

            padding: 18px 42px;

            background:
                linear-gradient(180deg, rgba(12, 6, 5, 0.98) 0%, rgba(19, 9, 7, 0.96) 100%),
                url("https://www.transparenttextures.com/patterns/leather.png");

            border-bottom: 1px solid rgba(212, 175, 55, 0.25);

            box-shadow:
                0 12px 35px rgba(0, 0, 0, 0.78),
                inset 0 -1px 0 rgba(255, 230, 150, 0.04);

            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(8px);
        }

        .nav-left {
            display: flex;
            align-items: center;
        }

        .archive-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.28rem;
            color: var(--gold);
            margin: 0;
            letter-spacing: 2.5px;
            text-transform: uppercase;

            text-shadow:
                0 3px 12px rgba(0, 0, 0, 0.9),
                0 0 16px rgba(212, 175, 55, 0.12);
        }

        .nav-center {
            display: flex;
            justify-content: center;
        }

        .search-form {
            display: flex;
            gap: 14px;
            align-items: center;

            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.58), rgba(255, 255, 255, 0.02));

            padding: 9px 14px;
            border-radius: 8px;
            border: 1px solid rgba(212, 175, 55, 0.18);

            box-shadow:
                inset 0 2px 8px rgba(0, 0, 0, 0.55),
                0 8px 18px rgba(0, 0, 0, 0.3);
        }

        .search-input {
            background: rgba(25, 15, 12, 0.72);
            border: 1px solid rgba(212, 175, 55, 0.28);
            color: var(--parchment);

            font-family: 'Lora', serif;
            font-size: 0.92rem;

            padding: 9px 15px;
            border-radius: 5px;
            outline: none;

            min-width: 220px;

            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.38);

            transition:
                border-color 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        .select-genre {
            min-width: 165px;
            cursor: pointer;
        }

        .search-input::placeholder {
            color: rgba(234, 217, 174, 0.45);
            font-style: italic;
        }

        .search-input:focus {
            border-color: rgba(212, 175, 55, 0.82);
            background: rgba(40, 20, 15, 0.92);

            box-shadow:
                inset 0 0 10px rgba(0, 0, 0, 0.45),
                0 0 16px rgba(212, 175, 55, 0.12);
        }

        .nav-right {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 18px;
        }

        .avatar-img,
        .avatar-placeholder {
            width: 42px;
            height: 42px;
            border-radius: 50%;

            border: 2px solid rgba(212, 175, 55, 0.75);

            box-shadow:
                0 4px 12px rgba(0, 0, 0, 0.85),
                0 0 12px rgba(212, 175, 55, 0.11);
        }

        .avatar-img {
            object-fit: cover;
        }

        .avatar-placeholder {
            background:
                radial-gradient(circle at 35% 30%, #7a2416, #351008 62%, #160604 100%);

            color: var(--gold);

            display: flex;
            align-items: center;
            justify-content: center;

            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
        }

        .scribe-greeting {
            font-family: 'Playfair Display', serif;
            color: var(--cream);
            font-style: italic;
            font-size: 1rem;
            border-right: 1px solid rgba(212, 175, 55, 0.28);
            padding-right: 18px;
            white-space: nowrap;
        }

        .nav-link {
            color: #a38954;
            text-decoration: none;
            font-size: 0.84rem;
            text-transform: uppercase;
            letter-spacing: 1.4px;

            transition:
                color 0.25s ease,
                text-shadow 0.25s ease;
        }

        .nav-link:hover {
            color: var(--parchment);
            text-shadow: 0 0 10px rgba(255, 230, 150, 0.25);
        }

        .nav-btn-gold {
            background: linear-gradient(145deg, #7a2021 0%, #4a1011 100%);

            color: var(--parchment);
            text-decoration: none;

            padding: 10px 22px;
            border: 1px solid #942b2c;
            border-radius: 5px;

            font-family: 'Playfair Display', serif;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 0.82rem;

            transition:
                transform 0.25s ease,
                background 0.25s ease,
                border-color 0.25s ease,
                box-shadow 0.25s ease;

            box-shadow: 0 5px 13px rgba(0, 0, 0, 0.62);
        }

        .nav-btn-gold:hover {
            background: linear-gradient(145deg, #942b2c 0%, #5e1516 100%);
            transform: translateY(-2px);
            border-color: var(--gold);

            box-shadow:
                0 8px 18px rgba(0, 0, 0, 0.82),
                0 0 16px rgba(212, 175, 55, 0.12);
        }

        .logout-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            font-family: 'Lora', serif;
        }

        .header {
            text-align: center;
            margin-bottom: 70px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.6rem;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 9px;
            margin: 0;

            text-shadow:
                0 4px 16px rgba(0, 0, 0, 0.95),
                0 0 20px rgba(212, 175, 55, 0.14);
        }

        .subtitle {
            font-style: italic;
            font-size: 1.15rem;
            color: var(--old-gold);
            margin-top: 16px;
            letter-spacing: 1px;
        }

        .notice-board {
            max-width: 1220px;
            margin: -30px auto 62px;

            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .notice-card {
            position: relative;

            padding: 30px 28px;

            background:
                linear-gradient(145deg, rgba(20, 10, 8, 0.94), rgba(8, 4, 3, 0.98)),
                url("https://www.transparenttextures.com/patterns/leather.png");

            border: 1px solid rgba(212, 175, 55, 0.24);
            border-radius: 14px;

            box-shadow:
                0 24px 55px rgba(0, 0, 0, 0.72),
                inset 0 0 24px rgba(212, 175, 55, 0.035);

            overflow: hidden;
        }

        .notice-card::before {
            content: "";
            position: absolute;
            inset: 10px;

            border: 1px double rgba(212, 175, 55, 0.14);
            border-radius: 9px;

            pointer-events: none;
        }

        .notice-card::after {
            content: "";
            position: absolute;
            top: -70px;
            right: -70px;

            width: 150px;
            height: 150px;

            background: radial-gradient(circle, rgba(212, 175, 55, 0.11), transparent 68%);
            pointer-events: none;
        }

        .notice-main {
            border-color: rgba(212, 175, 55, 0.38);

            box-shadow:
                0 28px 65px rgba(0, 0, 0, 0.78),
                0 0 22px rgba(212, 175, 55, 0.06),
                inset 0 0 24px rgba(212, 175, 55, 0.045);
        }

        .notice-label {
            position: relative;
            z-index: 2;

            display: inline-block;
            margin-bottom: 10px;

            color: var(--old-gold);

            font-family: 'Playfair Display', serif;
            font-size: 0.74rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 2.4px;
        }

        .notice-card h2 {
            position: relative;
            z-index: 2;

            margin: 0 0 12px;

            color: var(--gold);

            font-family: 'Playfair Display', serif;
            font-size: 1.45rem;

            text-transform: uppercase;
            letter-spacing: 2px;

            text-shadow:
                0 3px 10px rgba(0, 0, 0, 0.85),
                0 0 12px rgba(212, 175, 55, 0.1);
        }

        .notice-card p {
            position: relative;
            z-index: 2;

            margin: 0 0 22px;

            color: rgba(234, 217, 174, 0.78);

            font-size: 0.92rem;
            line-height: 1.65;
            font-style: italic;
        }

        .notice-link {
            position: relative;
            z-index: 2;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 10px 18px;

            background:
                linear-gradient(145deg, #7a2021 0%, #4a1011 100%);

            color: #f5eedc;
            text-decoration: none;

            border: 1px solid rgba(212, 175, 55, 0.4);
            border-radius: 999px;

            font-family: 'Playfair Display', serif;
            font-size: 0.76rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 1.4px;

            transition:
                transform 0.25s ease,
                border-color 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        .notice-link:hover {
            transform: translateY(-2px);
            border-color: var(--gold);

            background:
                linear-gradient(145deg, #942b2c 0%, #5e1516 100%);

            box-shadow:
                0 10px 20px rgba(0, 0, 0, 0.55),
                0 0 14px rgba(212, 175, 55, 0.12);
        }

        .library-section {
            max-width: 1220px;
            margin: 0 auto;
            padding: 35px 28px 60px;

            background:
                linear-gradient(90deg, rgba(0, 0, 0, 0.58), rgba(255, 255, 255, 0.02), rgba(0, 0, 0, 0.58)),
                linear-gradient(145deg, #130907, #070302);

            border: 1px solid rgba(212, 175, 55, 0.22);
            border-radius: 14px;

            box-shadow:
                0 35px 80px rgba(0, 0, 0, 0.85),
                inset 0 0 45px rgba(212, 175, 55, 0.04);
        }

        .library-frame {
            position: relative;
            padding: 28px 20px 10px;

            border: 1px solid rgba(128, 92, 28, 0.35);
            border-radius: 8px;

            background:
                linear-gradient(90deg, rgba(31, 12, 6, 0.8), rgba(18, 8, 5, 0.45), rgba(31, 12, 6, 0.8));
        }

        .library-frame::before,
        .library-frame::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            width: 18px;

            background:
                linear-gradient(90deg, #100604, #2a0f07, #0b0302);

            box-shadow: inset 0 0 14px rgba(0, 0, 0, 0.8);
            z-index: 1;
        }

        .library-frame::before {
            left: 0;
            border-radius: 8px 0 0 8px;
        }

        .library-frame::after {
            right: 0;
            border-radius: 0 8px 8px 0;
        }

        .shelf {
            position: relative;
            display: grid;
            grid-template-columns: repeat(5, minmax(140px, 1fr));
            gap: 34px;

            min-height: 315px;
            padding: 24px 42px 78px;
            margin-bottom: 48px;

            background:
                radial-gradient(circle at top, rgba(212, 175, 55, 0.08), transparent 40%),
                linear-gradient(180deg, rgba(255, 255, 255, 0.03), rgba(0, 0, 0, 0.32));

            border-radius: 6px;

            box-shadow:
                inset 0 30px 35px rgba(0, 0, 0, 0.32),
                inset 0 -18px 25px rgba(0, 0, 0, 0.55);
        }

        .shelf:last-child {
            margin-bottom: 0;
        }

        .shelf::before {
            content: "";
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 28px;
            height: 34px;

            background:
                linear-gradient(180deg, #3a160b 0%, #1c0804 55%, #080302 100%);

            border-top: 1px solid rgba(212, 175, 55, 0.28);
            border-bottom: 1px solid rgba(0, 0, 0, 0.85);
            border-radius: 3px;

            box-shadow:
                0 18px 26px rgba(0, 0, 0, 0.82),
                inset 0 5px 10px rgba(255, 216, 120, 0.05),
                inset 0 -8px 14px rgba(0, 0, 0, 0.65);

            z-index: 1;
        }

        .shelf::after {
            content: "";
            position: absolute;
            left: 36px;
            right: 36px;
            bottom: 62px;
            height: 2px;

            background:
                linear-gradient(90deg,
                    transparent,
                    rgba(212, 175, 55, 0.55),
                    rgba(255, 237, 160, 0.4),
                    rgba(212, 175, 55, 0.55),
                    transparent);

            z-index: 2;
        }

        .book-item {
            position: relative;
            z-index: 4;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;

            min-height: 260px;
            cursor: pointer;

            transition:
                transform 0.28s ease,
                filter 0.28s ease;
        }

        .book-item:hover {
            transform: translateY(-10px);
            filter: brightness(1.12);
        }

        .book-spine {
            width: 150px;
            height: 235px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 22px 16px;
            text-align: center;
            position: relative;
            overflow: hidden;

            background-image:
                url("https://www.transparenttextures.com/patterns/leather.png"),
                linear-gradient(145deg, #581313 0%, #2a0605 55%, #120302 100%);

            border: 1px solid rgba(212, 175, 55, 0.42);
            border-radius: 4px 10px 10px 4px;

            box-shadow:
                -12px 16px 22px rgba(0, 0, 0, 0.78),
                inset 10px 0 16px rgba(0, 0, 0, 0.45),
                inset -6px 0 12px rgba(255, 230, 150, 0.06);
        }

        .book-spine::before {
            content: "";
            position: absolute;
            inset: 13px 12px;
            border: 1px double rgba(212, 175, 55, 0.38);
            pointer-events: none;
        }

        .book-spine::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 20px;
            width: 3px;

            background:
                linear-gradient(to bottom,
                    transparent,
                    rgba(212, 175, 55, 0.45),
                    transparent);

            box-shadow: 70px 0 0 rgba(212, 175, 55, 0.14);
            opacity: 0.65;
        }

        .book-title {
            position: relative;
            z-index: 2;

            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            line-height: 1.35;

            color: var(--soft-gold);
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.2px;

            text-shadow:
                0 2px 5px rgba(0, 0, 0, 0.9),
                0 0 10px rgba(212, 175, 55, 0.12);
        }

        .book-author {
            margin-top: 15px;
            max-width: 165px;

            font-size: 0.85rem;
            font-style: italic;
            color: var(--cream);
            opacity: 0.82;
            text-align: center;

            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.8);
        }

        .favorite-mark {
            position: absolute;
            top: 18px;
            right: 22px;
            z-index: 8;

            color: var(--gold);
            font-size: 1.35rem;

            text-shadow:
                0 0 10px rgba(212, 175, 55, 0.3),
                0 2px 8px rgba(0, 0, 0, 0.9);

            display: none;
        }

        .book-item[data-is-favorited="true"] .favorite-mark {
            display: block;
        }

        .empty-shelf,
        .no-results-message {
            grid-column: 1 / -1;
            align-self: center;
            justify-self: center;

            padding: 50px 30px;

            color: var(--old-gold);
            font-style: italic;
            font-size: 1.2rem;
            text-align: center;

            border: 1px dashed rgba(212, 175, 55, 0.24);
            border-radius: 8px;
            background: rgba(0, 0, 0, 0.22);
        }

        .no-results-message {
            display: none;
            margin: 35px auto 0;
            max-width: 620px;
        }

        .book-item:nth-child(2n) .book-spine {
            height: 250px;
            background-image:
                url("https://www.transparenttextures.com/patterns/leather.png"),
                linear-gradient(145deg, #18301f 0%, #0c1a11 55%, #040906 100%);
        }

        .book-item:nth-child(3n) .book-spine {
            height: 220px;
            background-image:
                url("https://www.transparenttextures.com/patterns/leather.png"),
                linear-gradient(145deg, #2d234d 0%, #141025 55%, #070511 100%);
        }

        .book-item:nth-child(4n) .book-spine {
            height: 245px;
            background-image:
                url("https://www.transparenttextures.com/patterns/leather.png"),
                linear-gradient(145deg, #4d3511 0%, #241704 55%, #0d0701 100%);
        }

        .book-item:nth-child(5n) .book-spine {
            height: 230px;
            background-image:
                url("https://www.transparenttextures.com/patterns/leather.png"),
                linear-gradient(145deg, #3b101e 0%, #1d0710 55%, #080204 100%);
        }

        .modal-overlay {
            position: fixed;
            inset: 0;

            background:
                radial-gradient(circle at center, rgba(212, 175, 55, 0.08), transparent 38%),
                rgba(0, 0, 0, 0.88);

            display: none;
            align-items: center;
            justify-content: center;

            z-index: 1000;
            backdrop-filter: blur(7px);

            padding: 28px;
        }

        .modal-content {
            width: 100%;
            max-width: 930px;
            max-height: 90vh;
            overflow-y: auto;

            position: relative;

            padding: 46px;

            background:
                linear-gradient(145deg, rgba(31, 12, 8, 0.98), rgba(7, 4, 3, 0.98)),
                url("https://www.transparenttextures.com/patterns/leather.png");

            border: 1px solid rgba(212, 175, 55, 0.58);
            border-radius: 14px;

            box-shadow:
                0 40px 120px rgba(0, 0, 0, 0.95),
                0 0 45px rgba(212, 175, 55, 0.13),
                inset 0 0 32px rgba(212, 175, 55, 0.05);
        }

        .modal-content::before {
            content: "";
            position: absolute;
            inset: 12px;

            border: 1px double rgba(212, 175, 55, 0.22);
            border-radius: 9px;

            pointer-events: none;
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 26px;

            font-size: 2.1rem;
            line-height: 1;

            color: var(--gold);
            cursor: pointer;

            transition:
                transform 0.25s ease,
                color 0.25s ease,
                text-shadow 0.25s ease;

            z-index: 10;
        }

        .close-modal:hover {
            transform: rotate(90deg);
            color: var(--parchment);
            text-shadow: 0 0 16px rgba(212, 175, 55, 0.35);
        }

        .modal-body {
            position: relative;
            z-index: 2;
        }

        .view-container {
            width: 100%;
        }

        #book-details-view {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 42px;
            align-items: start;
        }

        .modal-info,
        .modal-social {
            padding: 26px;

            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.34), rgba(255, 255, 255, 0.02));

            border: 1px solid rgba(212, 175, 55, 0.16);
            border-radius: 10px;

            box-shadow:
                inset 0 0 22px rgba(0, 0, 0, 0.45),
                0 12px 28px rgba(0, 0, 0, 0.35);
        }

        .modal-info {
            text-align: center;
        }

        .book-portrait-large {
            width: 170px;
            height: 250px;

            margin: 0 auto 24px;

            display: flex;
            align-items: center;
            justify-content: center;

            background-image:
                url("https://www.transparenttextures.com/patterns/leather.png"),
                linear-gradient(145deg, #581313 0%, #2a0605 55%, #120302 100%);

            border: 1px solid rgba(212, 175, 55, 0.65);
            border-radius: 5px 12px 12px 5px;

            font-size: 3.4rem;
            color: var(--gold);

            box-shadow:
                -14px 18px 28px rgba(0, 0, 0, 0.75),
                inset 10px 0 18px rgba(0, 0, 0, 0.48),
                inset -6px 0 12px rgba(255, 230, 150, 0.08);
        }

        .gold-title {
            margin: 0 0 10px;

            font-family: 'Playfair Display', serif;
            color: var(--gold);
            font-size: 2rem;
            line-height: 1.15;
            letter-spacing: 2px;
            text-transform: uppercase;

            text-shadow:
                0 3px 12px rgba(0, 0, 0, 0.9),
                0 0 14px rgba(212, 175, 55, 0.14);
        }

        .author-sub {
            margin: 0 0 22px;
            color: rgba(234, 217, 174, 0.74);
            font-style: italic;
        }

        .book-meta {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        .meta-pill {
            padding: 7px 12px;

            color: var(--old-gold);
            font-size: 0.78rem;
            font-style: italic;

            border: 1px solid rgba(212, 175, 55, 0.18);
            border-radius: 999px;
            background: rgba(0, 0, 0, 0.28);
        }

        .modal-actions {
            display: grid;
            gap: 12px;
        }

        .fav-btn,
        .chat-btn,
        .back-btn,
        .send-whisper-btn {
            position: relative;

            border: 1px solid rgba(212, 175, 55, 0.72);
            border-radius: 5px;

            background:
                linear-gradient(145deg, #5b1414 0%, #2c0707 55%, #140303 100%);

            color: var(--gold);

            padding: 13px 18px;

            font-family: 'Playfair Display', serif;
            font-size: 0.94rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 1.8px;

            cursor: pointer;

            box-shadow:
                0 10px 22px rgba(0, 0, 0, 0.48),
                inset 0 0 12px rgba(212, 175, 55, 0.06);

            transition:
                transform 0.25s ease,
                background 0.25s ease,
                color 0.25s ease,
                box-shadow 0.25s ease;
        }

        .fav-btn:hover,
        .chat-btn:hover,
        .back-btn:hover,
        .send-whisper-btn:hover {
            transform: translateY(-2px);

            background:
                linear-gradient(145deg, #d4af37 0%, #9f7f25 100%);

            color: #160908;

            box-shadow:
                0 14px 30px rgba(0, 0, 0, 0.62),
                0 0 22px rgba(212, 175, 55, 0.18);
        }

        .fav-btn.active {
            background:
                linear-gradient(145deg, #d4af37 0%, #9f7f25 100%);

            color: #160908;
        }

        .fav-btn:disabled {
            opacity: 0.65;
            cursor: not-allowed;
        }

        .heart-icon {
            margin-right: 6px;
            font-size: 1.08rem;
        }

        .modal-social h3,
        .chat-header h3 {
            margin: 0 0 18px;

            font-family: 'Playfair Display', serif;
            font-size: 1.45rem;
            color: var(--gold);
            letter-spacing: 2px;
            text-transform: uppercase;

            text-shadow: 0 3px 10px rgba(0, 0, 0, 0.88);
        }

        .comments-list {
            height: 250px;
            overflow-y: auto;

            padding: 16px;

            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.42), rgba(255, 255, 255, 0.018));

            border-radius: 8px;
            border: 1px solid rgba(212, 175, 55, 0.12);

            box-shadow: inset 0 0 18px rgba(0, 0, 0, 0.48);
        }

        .comment {
            margin-bottom: 15px;
            padding: 12px 12px 14px;

            border-bottom: 1px solid rgba(212, 175, 55, 0.08);

            background: rgba(255, 255, 255, 0.018);
            border-radius: 6px;
        }

        .comment:last-child {
            margin-bottom: 0;
        }

        .comment strong {
            color: var(--gold);
            display: block;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .comment p {
            margin: 0;
            color: rgba(245, 238, 220, 0.86);
            font-size: 0.9rem;
            line-height: 1.55;
        }

        .comment small {
            display: block;
            margin-top: 7px;
            color: rgba(159, 132, 46, 0.78);
            font-style: italic;
            font-size: 0.74rem;
        }

        .comment-form {
            margin-top: 16px;
            display: grid;
            gap: 10px;
        }

        .comment-form textarea {
            width: 100%;
            min-height: 76px;
            resize: vertical;

            background: rgba(10, 5, 4, 0.8);
            border: 1px solid rgba(212, 175, 55, 0.24);
            color: var(--parchment);

            font-family: 'Lora', serif;
            font-size: 0.9rem;

            padding: 12px 13px;
            border-radius: 5px;
            outline: none;
        }

        #secret-chat-view {
            display: none;
        }

        .chat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 22px;
        }

        .back-btn {
            width: auto;
            padding: 10px 16px;
            font-size: 0.76rem;
        }

        .chat-panel {
            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.35), rgba(255, 255, 255, 0.018));

            border: 1px solid rgba(212, 175, 55, 0.16);
            border-radius: 10px;

            padding: 18px;

            box-shadow:
                inset 0 0 24px rgba(0, 0, 0, 0.46),
                0 14px 34px rgba(0, 0, 0, 0.36);
        }

        .chat-messages {
            height: 360px;
            overflow-y: auto;

            padding: 16px;

            background:
                radial-gradient(circle at top, rgba(212, 175, 55, 0.04), transparent 38%),
                rgba(0, 0, 0, 0.42);

            border: 1px solid rgba(212, 175, 55, 0.12);
            border-radius: 8px;

            box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.55);
        }

        .chat-message {
            margin-bottom: 12px;
            padding: 11px 13px;

            max-width: 82%;

            background: rgba(255, 255, 255, 0.035);
            border: 1px solid rgba(212, 175, 55, 0.08);
            border-radius: 8px 8px 8px 2px;

            color: rgba(245, 238, 220, 0.9);

            line-height: 1.5;
            font-size: 0.92rem;

            animation: whisperIn 0.35s ease both;
        }

        .chat-message.mine {
            margin-left: auto;

            border-radius: 8px 8px 2px 8px;
            background: rgba(122, 32, 33, 0.24);
            border-color: rgba(212, 175, 55, 0.15);
        }

        .chat-message strong {
            color: var(--gold);
            display: block;
            margin-bottom: 4px;
            font-size: 0.82rem;
        }

        .chat-time {
            display: block;
            margin-top: 5px;

            color: rgba(159, 132, 46, 0.75);
            font-size: 0.72rem;
            font-style: italic;
        }

        @keyframes whisperIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .chat-input-wrapper {
            display: flex;
            gap: 12px;
            margin-top: 16px;
        }

        #fake-chat-input {
            flex: 1;

            background: rgba(10, 5, 4, 0.8);
            border: 1px solid rgba(212, 175, 55, 0.24);
            color: var(--parchment);

            font-family: 'Lora', serif;
            font-size: 0.95rem;

            padding: 13px 14px;
            border-radius: 5px;
            outline: none;

            box-shadow: inset 0 0 12px rgba(0, 0, 0, 0.45);
        }

        #fake-chat-input:focus {
            border-color: rgba(212, 175, 55, 0.82);

            box-shadow:
                inset 0 0 12px rgba(0, 0, 0, 0.48),
                0 0 16px rgba(212, 175, 55, 0.12);
        }

        .send-whisper-btn {
            width: auto;
            white-space: nowrap;
            padding: 13px 18px;
            font-size: 0.78rem;
        }

        @media (max-width: 1150px) {
            .archive-navbar {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .nav-left,
            .nav-center,
            .nav-right {
                justify-content: center;
            }

            .nav-right {
                flex-wrap: wrap;
            }

            .scribe-greeting {
                border-right: none;
                padding-right: 0;
            }
        }

        @media (max-width: 1100px) {
            .shelf {
                grid-template-columns: repeat(4, minmax(130px, 1fr));
            }
        }

        @media (max-width: 850px) {
            body {
                padding: 0 18px 70px;
            }

            .archive-navbar {
                width: calc(100% + 36px);
                margin-left: -18px;
                padding: 18px 20px;
            }

            .search-form {
                flex-direction: column;
                width: 100%;
            }

            .search-input,
            .select-genre {
                width: 100%;
                min-width: 0;
            }

            h1 {
                font-size: 2.6rem;
                letter-spacing: 5px;
            }

            .library-section {
                padding: 25px 16px 45px;
            }

            .shelf {
                grid-template-columns: repeat(3, minmax(120px, 1fr));
                gap: 26px;
                padding: 20px 30px 76px;
            }

            .book-spine {
                width: 130px;
                height: 215px;
            }

            #book-details-view {
                grid-template-columns: 1fr;
            }

            .modal-content {
                padding: 36px 24px;
            }

            .chat-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .chat-input-wrapper {
                flex-direction: column;
            }

            .send-whisper-btn {
                width: 100%;
            }
        }

        @media (max-width: 600px) {
            .shelf {
                grid-template-columns: repeat(2, minmax(120px, 1fr));
                padding: 18px 22px 76px;
            }

            .book-spine {
                width: 120px;
                height: 200px;
            }

            .book-title {
                font-size: 0.9rem;
            }

            .gold-title {
                font-size: 1.55rem;
            }

            .comments-list,
            .chat-messages {
                height: 280px;
            }
        }

        @media (max-width: 1100px) {
            .notice-board {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>

    <nav class="archive-navbar">
        <div class="nav-left">
            <h1 class="archive-title">The Silken Manuscript</h1>
        </div>

        <div class="nav-center">
            <div class="search-form">
                <select id="genre-filter" class="search-input select-genre">
                    <option value="">All genres</option>
                    <option value="romance">Romance</option>
                    <option value="romantasy">Romantasy</option>
                    <option value="dark_academia">Dark Academia</option>
                    <option value="thriller">Thriller</option>
                </select>

                <input type="text" id="title-filter" placeholder="Search a title..." class="search-input">
            </div>
        </div>

        <div class="nav-right">

            @auth
                @if(auth()->user()->profile_picture)
                    <img src="{{ asset('avatars/' . auth()->user()->profile_picture) }}" alt="Avatar" class="avatar-img">
                @else
                    <div class="avatar-placeholder">✧</div>
                @endif

                <span class="scribe-greeting">
                    Reader {{ auth()->user()->getAttribute('username') ?: 'Reader' }}
                </span>

                <a href="{{ route('profile') }}" class="nav-link">
                    My Profile
                </a>

                <a href="{{ route('users.show', auth()->user()) }}" class="nav-link">
                    Public Profile
                </a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-link logout-btn">
                        Logout
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="nav-link">
                    Login
                </a>

                <a href="{{ route('register') }}" class="nav-btn-gold">
                    Sign Up
                </a>
            @endguest

        </div>
    </nav>

    <div class="header">
        <h1>The Archives</h1>
        <div class="subtitle">Where silken threads bind forgotten lore.</div>
    </div>

    <section class="notice-board">
        <div class="notice-card notice-main">
            <span class="notice-label">Latest Decrees</span>

            <h2>Chronicles</h2>

            <p>
                Read the latest announcements, updates, and official notes from The Silken Manuscript.
            </p>

            <a href="{{ route('news.index') }}" class="notice-link">
                View Chronicles
            </a>
        </div>

        <div class="notice-card">
            <span class="notice-label">Archive Conduct</span>

            <h2>Rules</h2>

            <p>
                Access the admin dashboard to manage readers, admins, chronicles, FAQ items, books, and contact
                messages.

            </p>

            <a href="{{ auth()->check() && auth()->user()->is_admin ? route('admin.dashboard') : route('rules.index') }}"
                class="notice-link">
                {{ auth()->check() && auth()->user()->is_admin ? 'Open Admin Dashboard' : 'Read Rules' }}
            </a>
        </div>

        <div class="notice-card">
            <span class="notice-label">Reader Correspondence</span>

            <h2>Contact</h2>

            @auth
                @if(auth()->user()->is_admin)
                    <p>
                        Review messages sent by readers and visitors through the public contact form.
                    </p>

                    <a href="{{ route('admin.contact-messages.index') }}" class="notice-link">
                        View Messages
                    </a>
                @else
                    <p>
                        Send a message to the curators for questions, issues, suggestions, or archive-related requests.
                    </p>

                    <a href="{{ route('contact.create') }}" class="notice-link">
                        Contact Us
                    </a>
                @endif
            @endauth

            @guest
                <p>
                    Send a message to the curators for questions, issues, suggestions, or archive-related requests.
                </p>

                <a href="{{ route('contact.create') }}" class="notice-link">
                    Contact Us
                </a>
            @endguest
        </div>

        <div class="notice-card">
            <span class="notice-label">Reader Help</span>

            <h2>FAQ</h2>

            <p>
                Find answers about accounts, profiles, favorites, chronicles, and archive access.
            </p>

            <a href="{{ route('faq.index') }}" class="notice-link">
                Open FAQ
            </a>
        </div>
    </section>


    <div class="library-section">
        <div class="library-frame">

            @forelse($books->chunk(5) as $row)
                <div class="shelf">
                    @foreach($row as $book)
                        <div class="book-item" data-book-id="{{ $book->id }}" data-title="{{ strtolower($book->title) }}"
                            data-author="{{ $book->author }}" data-genre="{{ strtolower($book->genre) }}"
                            data-genre-label="{{ $book->genre }}"
                            data-is-favorited="{{ auth()->check() && auth()->user()->favorites->contains($book->id) ? 'true' : 'false' }}">
                            <span class="favorite-mark">♥</span>

                            <div class="book-spine">
                                <span class="book-title">{{ $book->title }}</span>
                            </div>

                            <div class="book-author">{{ $book->author }}</div>
                        </div>
                    @endforeach
                </div>
            @empty
                <div class="shelf">
                    <div class="empty-shelf">
                        "The shelves are bare. Await the scribe's ink."
                    </div>
                </div>
            @endforelse

            <div id="no-results-message" class="no-results-message">
                No manuscript answered your search. Try another title or genre.
            </div>

        </div>
    </div>

    <div id="book-modal" class="modal-overlay">
        <div class="modal-content">
            <span class="close-modal">&times;</span>

            <div class="modal-body">

                <div id="book-details-view" class="view-container">
                    <div class="modal-info">
                        <div id="modal-book-portrait" class="book-portrait-large">✧</div>

                        <h2 id="modal-title" class="gold-title">Manuscript Title</h2>
                        <p id="modal-author" class="author-sub">By Unknown Author</p>

                        <div class="book-meta">
                            <span id="modal-genre" class="meta-pill">Unknown genre</span>
                            <span id="modal-mood" class="meta-pill">Velvet mystery</span>
                            <span id="modal-status" class="meta-pill">Discussed by readers</span>
                        </div>

                        <div class="modal-actions">
                            @auth
                                <button id="favorite-trigger" class="fav-btn">
                                    <span class="heart-icon">♡</span> Add to Favorites
                                </button>
                            @else
                                <a href="{{ route('login') }}" class="chat-btn" style="text-decoration:none;">
                                    Login to Save Favorites
                                </a>
                            @endauth

                            <button id="open-chat-trigger" class="chat-btn">Enter Secret Chat</button>
                        </div>
                    </div>

                    <div class="modal-social">
                        <h3>Public Whispers</h3>

                        <div id="comments-container" class="comments-list"></div>

                        @auth
                            <div class="comment-form">
                                <textarea id="comment-input" placeholder="Leave a public whisper..."></textarea>
                                <button id="send-comment" class="chat-btn">Publish Whisper</button>
                            </div>
                        @else
                            <div class="comment-form">
                                <a href="{{ route('login') }}" class="chat-btn"
                                    style="text-decoration:none; text-align:center;">
                                    Login to Comment
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>

                <div id="secret-chat-view" class="view-container">
                    <div class="chat-header">
                        <h3 id="chat-room-title"># Secret_Chamber</h3>
                        <button id="back-to-info" class="back-btn">← Back to Records</button>
                    </div>

                    <div class="chat-panel">
                        <div id="chat-messages-container" class="chat-messages"></div>

                        @auth
                            <div class="chat-input-wrapper">
                                <input type="text" id="fake-chat-input" placeholder="Whisper to the shadows...">
                                <button id="send-fake-message" class="send-whisper-btn">Send</button>
                            </div>
                        @else
                            <div class="chat-input-wrapper">
                                <a href="{{ route('login') }}" class="send-whisper-btn"
                                    style="text-decoration:none; text-align:center;">
                                    Login to Chat
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const titleInput = document.getElementById('title-filter');
            const genreSelect = document.getElementById('genre-filter');
            const books = document.querySelectorAll('.book-item');
            const shelves = document.querySelectorAll('.shelf');
            const noResultsMessage = document.getElementById('no-results-message');

            const modal = document.getElementById('book-modal');
            const closeModal = document.querySelector('.close-modal');

            const detailsView = document.getElementById('book-details-view');
            const chatView = document.getElementById('secret-chat-view');

            const modalTitle = document.getElementById('modal-title');
            const modalAuthor = document.getElementById('modal-author');
            const modalGenre = document.getElementById('modal-genre');
            const modalMood = document.getElementById('modal-mood');
            const modalStatus = document.getElementById('modal-status');
            const modalPortrait = document.getElementById('modal-book-portrait');

            const commentsContainer = document.getElementById('comments-container');
            const commentInput = document.getElementById('comment-input');
            const sendComment = document.getElementById('send-comment');

            const favBtn = document.getElementById('favorite-trigger');
            const chatTrigger = document.getElementById('open-chat-trigger');
            const backBtn = document.getElementById('back-to-info');

            const chatTitle = document.getElementById('chat-room-title');
            const messagesContainer = document.getElementById('chat-messages-container');
            const fakeInput = document.getElementById('fake-chat-input');
            const sendFakeMessage = document.getElementById('send-fake-message');

            let currentBookTitle = '';
            let currentBookId = null;
            let currentBookIsFavorited = false;

            const commentBank = [
                {
                    user: "VelvetReader",
                    text: "The atmosphere in this one feels like candlelight, old letters, and secrets nobody should have opened.",
                    time: "2 minutes ago"
                },
                {
                    user: "InkAndIvory",
                    text: "I did not expect the emotional tension to hit this hard. The slow build is genuinely beautiful.",
                    time: "9 minutes ago"
                },
                {
                    user: "MoonlitPages",
                    text: "This book has the exact kind of obsession, mystery, and dramatic elegance I wanted.",
                    time: "17 minutes ago"
                },
                {
                    user: "SilentScholar",
                    text: "The main character is suspicious, but in the best possible way. I trust nobody here.",
                    time: "24 minutes ago"
                },
                {
                    user: "ArchiveGhost",
                    text: "The ending feels like a locked door. I need someone to explain the symbolism.",
                    time: "31 minutes ago"
                },
                {
                    user: "CrimsonBookmark",
                    text: "The writing style is rich without being heavy. Very dark academia, very addictive.",
                    time: "44 minutes ago"
                }
            ];

            const chatBank = [
                {
                    user: "Shadow_Reader",
                    text: "Did anyone else notice the repeated symbol on the cover and in chapter seven?",
                    time: "21:04"
                },
                {
                    user: "Ink_Master",
                    text: "Yes. I think it means the narrator is hiding something from the beginning.",
                    time: "21:05"
                },
                {
                    user: "Silent_Scholar",
                    text: "The author keeps describing the windows. That cannot be random.",
                    time: "21:06"
                },
                {
                    user: "Velvet_Moth",
                    text: "I swear this book is not just romance or mystery. It is basically a puzzle.",
                    time: "21:07"
                },
                {
                    user: "PaperGhost",
                    text: "The last line changed the whole meaning of the first chapter for me.",
                    time: "21:08"
                }
            ];

            const moodByGenre = {
                romance: "Velvet longing",
                romantasy: "Enchanted tension",
                dark_academia: "Candlelit secrets",
                thriller: "Uneasy suspense"
            };

            function getCsrfToken() {
                const token = document.querySelector('meta[name="csrf-token"]');

                if (!token) {
                    return '';
                }

                return token.getAttribute('content');
            }

            function updateFavoriteButton(isFavorited) {
                currentBookIsFavorited = isFavorited;

                if (!favBtn) {
                    return;
                }

                if (isFavorited) {
                    favBtn.classList.add('active');
                    favBtn.innerHTML = `<span class="heart-icon">♥</span> Added to Favorites`;
                } else {
                    favBtn.classList.remove('active');
                    favBtn.innerHTML = `<span class="heart-icon">♡</span> Add to Favorites`;
                }
            }

            function updateBookFavoriteMark(bookId, isFavorited) {
                const currentBookElement = document.querySelector(`.book-item[data-book-id="${bookId}"]`);

                if (currentBookElement) {
                    currentBookElement.setAttribute('data-is-favorited', isFavorited ? 'true' : 'false');
                }
            }

            function filterBooks() {
                const titleTerm = titleInput.value.toLowerCase().trim();
                const genreTerm = genreSelect.value.toLowerCase().trim();

                let visibleCount = 0;

                books.forEach(book => {
                    const bookTitle = book.getAttribute('data-title') || '';
                    const bookGenre = book.getAttribute('data-genre') || '';

                    const matchesTitle = bookTitle.includes(titleTerm);
                    const matchesGenre = genreTerm === "" || bookGenre === genreTerm;

                    if (matchesTitle && matchesGenre) {
                        book.style.display = 'flex';
                        visibleCount++;
                    } else {
                        book.style.display = 'none';
                    }
                });

                shelves.forEach(shelf => {
                    let hasVisibleBook = false;

                    shelf.querySelectorAll('.book-item').forEach(book => {
                        if (book.style.display !== 'none') {
                            hasVisibleBook = true;
                        }
                    });

                    shelf.style.display = hasVisibleBook ? 'grid' : 'none';
                });

                noResultsMessage.style.display = visibleCount === 0 ? 'block' : 'none';
            }

            function renderComments(bookTitle) {
                commentsContainer.innerHTML = '';

                const shuffled = [...commentBank].sort(() => Math.random() - 0.5).slice(0, 4);

                shuffled.forEach(comment => {
                    const div = document.createElement('div');
                    div.className = 'comment';

                    div.innerHTML = `
                        <strong>${comment.user}</strong>
                        <p>${comment.text}</p>
                        <small>${comment.time} · discussing "${bookTitle}"</small>
                    `;

                    commentsContainer.appendChild(div);
                });
            }

            function addCommentToView(user, text, time = 'just now') {
                const div = document.createElement('div');
                div.className = 'comment';

                div.innerHTML = `
                    <strong>${user}</strong>
                    <p>${text}</p>
                    <small>${time} · discussing "${currentBookTitle}"</small>
                `;

                commentsContainer.prepend(div);
            }

            function renderChat(bookTitle) {
                messagesContainer.innerHTML = '';

                const intro = document.createElement('div');
                intro.className = 'chat-message';

                intro.innerHTML = `
                    <strong>Archive_Bot</strong>
                    The secret chamber for "${bookTitle}" has opened. Speak softly.
                    <span class="chat-time">now</span>
                `;

                messagesContainer.appendChild(intro);

                chatBank.forEach((msg, index) => {
                    setTimeout(() => {
                        const div = document.createElement('div');
                        div.className = 'chat-message';

                        div.innerHTML = `
                            <strong>${msg.user}</strong>
                            ${msg.text}
                            <span class="chat-time">${msg.time}</span>
                        `;

                        messagesContainer.appendChild(div);
                        messagesContainer.scrollTop = messagesContainer.scrollHeight;
                    }, index * 450);
                });
            }

            function addChatMessageToView(user, text, isMine = false, time = 'just now') {
                const div = document.createElement('div');
                div.className = isMine ? 'chat-message mine' : 'chat-message';

                div.innerHTML = `
                    <strong>${user}</strong>
                    ${text}
                    <span class="chat-time">${time}</span>
                `;

                messagesContainer.appendChild(div);
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }

            function openModal(book) {
                const title = book.querySelector('.book-title').innerText;
                const author = book.querySelector('.book-author').innerText;
                const genre = book.getAttribute('data-genre') || 'unknown';
                const genreLabel = book.getAttribute('data-genre-label') || 'Unknown genre';

                currentBookId = book.getAttribute('data-book-id');
                currentBookTitle = title;
                currentBookIsFavorited = book.getAttribute('data-is-favorited') === 'true';

                detailsView.style.display = 'grid';
                chatView.style.display = 'none';

                modalTitle.innerText = title;
                modalAuthor.innerText = `By ${author}`;
                modalGenre.innerText = genreLabel;
                modalMood.innerText = moodByGenre[genre] || "Velvet mystery";
                modalStatus.innerText = currentBookIsFavorited ? "Saved in your archive" : "Readers are whispering";

                modalPortrait.innerText = title.charAt(0).toUpperCase();

                updateFavoriteButton(currentBookIsFavorited);
                renderComments(title);

                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }

            books.forEach(book => {
                book.addEventListener('click', () => openModal(book));
            });

            if (titleInput && genreSelect) {
                titleInput.addEventListener('input', filterBooks);
                genreSelect.addEventListener('change', filterBooks);
            }

            if (favBtn) {
                favBtn.addEventListener('click', async () => {
                    if (!currentBookId) {
                        return;
                    }

                    favBtn.disabled = true;

                    try {
                        const response = await fetch(`/books/${currentBookId}/toggle-favorite`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': getCsrfToken(),
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        });

                        if (!response.ok) {
                            throw new Error('Favorite request failed');
                        }

                        const data = await response.json();

                        updateFavoriteButton(data.isFavorited);
                        updateBookFavoriteMark(currentBookId, data.isFavorited);

                        modalStatus.innerText = data.isFavorited ? "Saved in your archive" : "Readers are whispering";

                    } catch (error) {
                        console.error(error);
                        alert('Impossible de sauvegarder le favori pour le moment.');
                    } finally {
                        favBtn.disabled = false;
                    }
                });
            }

            if (sendComment && commentInput) {
                sendComment.addEventListener('click', async () => {
                    const text = commentInput.value.trim();

                    if (!text || !currentBookId) {
                        return;
                    }

                    addCommentToView('You', text);
                    commentInput.value = '';
                });
            }

            chatTrigger.addEventListener('click', () => {
                detailsView.style.display = 'none';
                chatView.style.display = 'block';

                const safeRoomTitle = currentBookTitle
                    .replace(/[^a-zA-Z0-9 ]/g, '')
                    .replace(/\s+/g, '_')
                    .toLowerCase();

                chatTitle.innerText = `# ${safeRoomTitle || 'secret_chamber'}`;

                renderChat(currentBookTitle);
            });

            if (sendFakeMessage && fakeInput) {
                sendFakeMessage.addEventListener('click', () => {
                    const text = fakeInput.value.trim();

                    if (!text) {
                        return;
                    }

                    addChatMessageToView('You', text, true);

                    fakeInput.value = '';

                    setTimeout(() => {
                        addChatMessageToView('Shadow_Reader', 'Interesting theory. The archive remembers this.');
                    }, 900);
                });

                fakeInput.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter') {
                        sendFakeMessage.click();
                    }
                });
            }

            backBtn.addEventListener('click', () => {
                chatView.style.display = 'none';
                detailsView.style.display = 'grid';
            });

            function closeAll() {
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }

            closeModal.addEventListener('click', closeAll);

            window.addEventListener('click', function (e) {
                if (e.target === modal) {
                    closeAll();
                }
            });

            window.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && modal.style.display === 'flex') {
                    closeAll();
                }
            });
        });
    </script>

</body>