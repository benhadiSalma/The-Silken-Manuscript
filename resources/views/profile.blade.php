<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ auth()->user()->name }}'s Record - The Silken Manuscript</title>
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
            --deep-brown: #160d0b;
            --wine: #7a2021;
            --dark-wine: #4a1011;
            --border-gold: rgba(212, 175, 55, 0.32);
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 55px 24px 75px;

            display: flex;
            flex-direction: column;
            align-items: center;

            font-family: 'Lora', serif;
            color: var(--cream);

            background:
                radial-gradient(circle at top, rgba(173, 124, 54, 0.16), transparent 35%),
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

            background:
                radial-gradient(circle at center, transparent 42%, rgba(0, 0, 0, 0.72) 100%);

            pointer-events: none;
            z-index: -1;
        }

        /* Carte principale */
        .discord-card {
            width: 100%;
            max-width: 680px;

            position: relative;
            overflow: hidden;

            background:
                linear-gradient(145deg, rgba(38, 16, 10, 0.98), rgba(8, 4, 3, 0.99)),
                url("https://www.transparenttextures.com/patterns/leather.png");

            border: 1px solid rgba(212, 175, 55, 0.35);
            border-radius: 16px;

            box-shadow:
                0 45px 110px rgba(0, 0, 0, 0.9),
                0 18px 40px rgba(0, 0, 0, 0.72),
                inset 0 0 30px rgba(212, 175, 55, 0.05),
                inset 0 0 70px rgba(0, 0, 0, 0.55);
        }

        .discord-card::before {
            content: "";
            position: absolute;
            inset: 11px;

            border: 1px double rgba(212, 175, 55, 0.22);
            border-radius: 11px;

            pointer-events: none;
            z-index: 2;
        }

        .discord-card::after {
            content: "";
            position: absolute;
            top: -130px;
            left: 50%;

            width: 320px;
            height: 320px;

            background: radial-gradient(circle, rgba(212, 175, 55, 0.12), transparent 68%);
            transform: translateX(-50%);

            pointer-events: none;
            z-index: 1;
        }

        .discord-card>* {
            position: relative;
            z-index: 3;
        }

        /* Bannière */
        .card-banner {
            height: 155px;
            width: 100%;

            background:
                radial-gradient(circle at center, rgba(212, 175, 55, 0.14), transparent 45%),
                linear-gradient(145deg, #4a1011 0%, #230706 52%, #090302 100%),
                url("https://www.transparenttextures.com/patterns/dark-leather.png");

            border-bottom: 1px solid rgba(212, 175, 55, 0.25);

            box-shadow:
                inset 0 -26px 40px rgba(0, 0, 0, 0.58),
                inset 0 0 22px rgba(212, 175, 55, 0.06);
        }

        .card-banner::after {
            content: "The Reader's Record";
            position: absolute;
            top: 38px;
            left: 50%;

            transform: translateX(-50%);

            font-family: 'Playfair Display', serif;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 4px;

            color: rgba(212, 175, 55, 0.38);

            white-space: nowrap;
        }

        /* Header profil */
        .card-header {
            padding: 0 34px 28px;
            position: relative;

            display: flex;
            flex-direction: column;
            align-items: center;

            margin-top: -68px;
        }

        .avatar-container {
            width: 136px;
            height: 136px;

            border-radius: 50%;
            border: 7px solid #0a0504;

            background:
                radial-gradient(circle at 35% 30%, #7a2416, #351008 62%, #160604 100%);

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            box-shadow:
                0 14px 26px rgba(0, 0, 0, 0.72),
                0 0 0 1px rgba(212, 175, 55, 0.55),
                0 0 24px rgba(212, 175, 55, 0.12);
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-placeholder {
            font-size: 3rem;
            color: var(--gold);
            font-family: 'Playfair Display', serif;

            text-shadow:
                0 0 12px rgba(212, 175, 55, 0.25),
                0 3px 10px rgba(0, 0, 0, 0.9);
        }

        .username {
            margin: 18px 0 7px;

            font-family: 'Playfair Display', serif;
            font-size: 2.15rem;
            line-height: 1.1;

            color: var(--gold);

            text-transform: uppercase;
            letter-spacing: 2.5px;
            text-align: center;

            text-shadow:
                0 4px 15px rgba(0, 0, 0, 0.92),
                0 0 18px rgba(212, 175, 55, 0.14);
        }

        .current-bio {
            max-width: 88%;

            margin-bottom: 8px;

            color: rgba(245, 238, 220, 0.78);
            font-size: 0.98rem;
            font-style: italic;
            text-align: center;
            line-height: 1.7;
        }

        /* Section édition */
        .edit-section {
            padding: 34px 42px 38px;

            border-top: 1px solid rgba(212, 175, 55, 0.16);

            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.36), rgba(255, 255, 255, 0.018));

            box-shadow:
                inset 0 18px 28px rgba(0, 0, 0, 0.35);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 22px;
        }

        label {
            margin-bottom: 9px;

            font-family: 'Playfair Display', serif;
            color: var(--soft-gold);

            text-transform: uppercase;
            letter-spacing: 1.6px;
            font-size: 0.88rem;

            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.75);
        }

        textarea,
        input[type="file"] {
            width: 100%;

            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.52), rgba(255, 255, 255, 0.025));

            border: 1px solid rgba(212, 175, 55, 0.25);
            border-radius: 7px;

            color: var(--parchment);

            font-family: 'Lora', serif;
            font-size: 0.95rem;

            padding: 13px 14px;

            outline: none;

            box-shadow:
                inset 0 0 14px rgba(0, 0, 0, 0.45),
                0 8px 18px rgba(0, 0, 0, 0.22);

            transition:
                border-color 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        textarea {
            resize: vertical;
            min-height: 110px;
            line-height: 1.6;
        }

        textarea:focus,
        input[type="file"]:hover {
            border-color: rgba(212, 175, 55, 0.82);

            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.58), rgba(212, 175, 55, 0.04));

            box-shadow:
                inset 0 0 14px rgba(0, 0, 0, 0.48),
                0 0 18px rgba(212, 175, 55, 0.1);
        }

        textarea::placeholder {
            color: rgba(234, 217, 174, 0.36);
            font-style: italic;
        }

        input[type="file"]::file-selector-button {
            margin-right: 14px;

            background:
                linear-gradient(145deg, #24100b 0%, #100604 100%);

            color: var(--soft-gold);

            border: 1px solid rgba(212, 175, 55, 0.38);
            border-radius: 4px;

            padding: 7px 13px;

            font-family: 'Playfair Display', serif;
            letter-spacing: 1px;

            cursor: pointer;

            transition:
                background 0.25s ease,
                color 0.25s ease,
                border-color 0.25s ease;
        }

        input[type="file"]::file-selector-button:hover {
            background:
                linear-gradient(145deg, var(--gold) 0%, #9f7f25 100%);

            color: #160908;
            border-color: rgba(212, 175, 55, 0.9);
        }

        /* Bouton */
        .nav-btn-gold {
            width: 100%;

            position: relative;

            margin-top: 12px;
            padding: 15px 20px;

            background:
                linear-gradient(145deg, #5b1414 0%, #2c0707 55%, #140303 100%);

            color: var(--gold);

            border: 1px solid rgba(212, 175, 55, 0.78);
            border-radius: 5px;

            font-family: 'Playfair Display', serif;
            font-size: 0.94rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 2.4px;

            cursor: pointer;

            box-shadow:
                0 12px 26px rgba(0, 0, 0, 0.52),
                inset 0 0 12px rgba(212, 175, 55, 0.06);

            transition:
                transform 0.25s ease,
                background 0.25s ease,
                color 0.25s ease,
                box-shadow 0.25s ease;
        }

        .nav-btn-gold::before {
            content: "";
            position: absolute;
            inset: 5px;

            border: 1px solid rgba(212, 175, 55, 0.24);
            border-radius: 3px;

            pointer-events: none;
        }

        .nav-btn-gold:hover {
            transform: translateY(-2px);

            background:
                linear-gradient(145deg, var(--gold) 0%, #9f7f25 100%);

            color: #160908;

            box-shadow:
                0 16px 34px rgba(0, 0, 0, 0.66),
                0 0 24px rgba(212, 175, 55, 0.18);
        }

        /* Section favoris intégrée à la carte */
        .favorites-section {
            width: 100%;
            max-width: 680px;

            position: relative;

            margin-top: 28px;
            padding: 32px 34px 38px;

            background:
                linear-gradient(145deg, rgba(38, 16, 10, 0.95), rgba(8, 4, 3, 0.98)),
                url("https://www.transparenttextures.com/patterns/dark-wood.png");

            border: 1px solid rgba(212, 175, 55, 0.28);
            border-radius: 14px;

            box-shadow:
                0 32px 80px rgba(0, 0, 0, 0.82),
                inset 0 0 30px rgba(212, 175, 55, 0.035),
                inset 0 -24px 40px rgba(0, 0, 0, 0.45);

            overflow: hidden;
        }

        .favorites-section::before {
            content: "";
            position: absolute;
            inset: 10px;

            border: 1px double rgba(212, 175, 55, 0.18);
            border-radius: 9px;

            pointer-events: none;
        }

        .favorites-section::after {
            content: "";
            position: absolute;
            left: 24px;
            right: 24px;
            bottom: 24px;
            height: 22px;

            background:
                linear-gradient(180deg, #3a160b 0%, #1c0804 55%, #080302 100%);

            border-top: 1px solid rgba(212, 175, 55, 0.25);
            border-bottom: 1px solid rgba(0, 0, 0, 0.85);
            border-radius: 3px;

            box-shadow:
                0 14px 22px rgba(0, 0, 0, 0.8),
                inset 0 5px 9px rgba(255, 216, 120, 0.045),
                inset 0 -7px 12px rgba(0, 0, 0, 0.65);

            z-index: 1;
        }

        .section-title {
            position: relative;
            z-index: 3;

            margin: 0 0 26px;

            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;

            color: var(--gold);

            text-transform: uppercase;
            letter-spacing: 3px;
            text-align: center;

            text-shadow:
                0 3px 12px rgba(0, 0, 0, 0.9),
                0 0 16px rgba(212, 175, 55, 0.12);
        }

        .section-title::after {
            content: "";
            display: block;

            width: 90px;
            height: 1px;

            margin: 14px auto 0;

            background:
                linear-gradient(90deg,
                    transparent,
                    rgba(212, 175, 55, 0.75),
                    rgba(255, 238, 170, 0.7),
                    rgba(212, 175, 55, 0.75),
                    transparent);

            box-shadow: 0 0 12px rgba(212, 175, 55, 0.25);
        }

        .favorites-grid {
            position: relative;
            z-index: 3;

            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(92px, 1fr));
            gap: 24px 18px;

            padding: 4px 6px 34px;
        }

        .fav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;

            min-height: 145px;

            transition:
                transform 0.25s ease,
                filter 0.25s ease;
        }

        .fav-item:hover {
            transform: translateY(-6px);
            filter: brightness(1.12);
        }

        .fav-spine {
            width: 72px;
            height: 105px;

            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid rgba(212, 175, 55, 0.42);
            border-radius: 3px 7px 7px 3px;

            background-image:
                url("https://www.transparenttextures.com/patterns/leather.png"),
                linear-gradient(145deg, #581313 0%, #2a0605 55%, #120302 100%);

            box-shadow:
                -7px 10px 16px rgba(0, 0, 0, 0.72),
                inset 7px 0 12px rgba(0, 0, 0, 0.42),
                inset -4px 0 8px rgba(255, 230, 150, 0.06);
        }

        .fav-spine::before {
            content: "";
            position: absolute;
            inset: 8px 7px;

            border: 1px double rgba(212, 175, 55, 0.32);

            pointer-events: none;
        }

        .fav-spine::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 10px;

            width: 2px;

            background:
                linear-gradient(to bottom,
                    transparent,
                    rgba(212, 175, 55, 0.42),
                    transparent);

            opacity: 0.7;
        }

        .fav-letter {
            position: relative;
            z-index: 2;

            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;

            color: var(--gold);

            text-shadow:
                0 2px 4px rgba(0, 0, 0, 0.85),
                0 0 10px rgba(212, 175, 55, 0.12);
        }

        .fav-title {
            max-width: 92px;

            margin-top: 10px;

            font-size: 0.76rem;
            line-height: 1.35;

            color: rgba(234, 217, 174, 0.84);

            text-align: center;
            font-style: italic;

            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.85);
        }

        .empty-favorites {
            grid-column: 1 / -1;

            padding: 28px 24px;
            margin-bottom: 18px;

            text-align: center;

            border: 1px dashed rgba(212, 175, 55, 0.22);
            border-radius: 9px;

            background:
                linear-gradient(145deg, rgba(0, 0, 0, 0.34), rgba(255, 255, 255, 0.018));

            box-shadow: inset 0 0 18px rgba(0, 0, 0, 0.38);
        }

        .empty-favorites p {
            margin: 0;

            color: var(--old-gold);
            font-size: 0.9rem;
            font-style: italic;
            line-height: 1.6;
        }

        /* Lien retour */
        .back-link {
            display: inline-block;

            margin-top: 34px;

            color: var(--old-gold);
            text-decoration: none;
            font-style: italic;

            transition:
                color 0.25s ease,
                text-shadow 0.25s ease,
                transform 0.25s ease;
        }

        .back-link:hover {
            color: var(--gold);
            transform: translateX(-3px);
            text-shadow: 0 0 12px rgba(212, 175, 55, 0.22);
        }

        /* Responsive */
        @media (max-width: 720px) {
            body {
                padding: 38px 16px 65px;
            }

            .discord-card,
            .favorites-section {
                max-width: 100%;
            }

            .card-banner {
                height: 135px;
            }

            .card-header {
                padding: 0 24px 26px;
            }

            .avatar-container {
                width: 118px;
                height: 118px;
            }

            .username {
                font-size: 1.65rem;
                letter-spacing: 2px;
            }

            .current-bio {
                max-width: 96%;
                font-size: 0.92rem;
            }

            .edit-section {
                padding: 30px 24px 34px;
            }

            .favorites-section {
                padding: 30px 22px 36px;
            }

            .favorites-grid {
                grid-template-columns: repeat(auto-fill, minmax(78px, 1fr));
                gap: 22px 14px;
            }

            .fav-spine {
                width: 64px;
                height: 96px;
            }

            .section-title {
                font-size: 1.05rem;
                letter-spacing: 2.2px;
            }
        }
    </style>
</head>

<body>

    <div class="discord-card">

        <div class="card-banner"></div>


        <div class="card-header">
            <div class="avatar-container">
                @if(auth()->user()->profile_picture)
                    <img src="{{ asset('avatars/' . auth()->user()->profile_picture) }}" alt="Avatar" class="avatar-img">
                @else
                    <div class="avatar-placeholder">✧</div>
                @endif
            </div>

            <div class="username">
                {{ auth()->user()->getAttribute('username') ?: 'Reader' }}
            </div>

            <div class="current-bio">
                @if(auth()->user()->bio)
                    "{{ auth()->user()->bio }}"
                @else
                    No lore has been transcribed yet...
                @endif
            </div>
        </div>

        <!-- Section Édition -->
        <div class="edit-section">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="profile_picture">Update Portrait</label>
                    <input type="file" id="profile_picture" name="profile_picture"
                        accept="image/jpeg, image/png, image/webp">
                </div>

                <div class="form-group">
                    <label for="bio">Rewrite Biography</label>
                    <textarea id="bio" name="bio" rows="4"
                        placeholder="Tell the archives of your tastes...">{{ auth()->user()->bio }}</textarea>
                </div>

                <button type="submit" class="nav-btn-gold">Seal the Record</button>
            </form>
        </div>
        <div class="favorites-section">
            <h3 class="section-title">Bookmarked Manuscripts</h3>

            <div class="favorites-grid">
                @forelse(auth()->user()->favorites as $book)
                    <div class="fav-item" title="{{ $book->title }}">
                        <div class="fav-spine" style="background-image: linear-gradient(145deg, #581313 0%, #120302 100%);">
                            <span class="fav-letter">{{ substr($book->title, 0, 1) }}</span>
                        </div>
                        <span class="fav-title">{{ Str::limit($book->title, 12) }}</span>
                    </div>
                @empty
                    <div class="empty-favorites">
                        <p>Your library remains a silent void. Explore the archives to find your first threads.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <a href="{{ url('/index') }}" class="back-link">← Return to the library</a>

</body>

</html>