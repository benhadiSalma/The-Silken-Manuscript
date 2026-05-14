<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $user->getAttribute('username') ?: 'Reader' }} - Public Profile</title>

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

        .profile-card {
            max-width: 850px;
            margin: 0 auto;
            overflow: hidden;

            background:
                linear-gradient(145deg, rgba(20, 10, 8, 0.97), rgba(8, 4, 3, 0.99)),
                url("https://www.transparenttextures.com/patterns/leather.png");

            border: 1px solid rgba(212, 175, 55, 0.35);
            border-radius: 18px;

            box-shadow:
                0 36px 90px rgba(0, 0, 0, 0.9),
                inset 0 0 34px rgba(212, 175, 55, 0.04);
        }

        .banner {
            height: 150px;
            background:
                radial-gradient(circle at center, rgba(212, 175, 55, 0.18), transparent 58%),
                linear-gradient(145deg, #4a1011 0%, #180606 100%);
            border-bottom: 1px solid rgba(212, 175, 55, 0.24);
        }

        .profile-header {
            text-align: center;
            padding: 0 34px 34px;
            margin-top: -68px;
        }

        .avatar {
            width: 136px;
            height: 136px;
            margin: 0 auto 18px;

            border-radius: 50%;
            border: 6px solid #080403;
            overflow: hidden;

            background: radial-gradient(circle at 35% 30%, #7a2416, #351008 62%, #160604 100%);

            display: flex;
            align-items: center;
            justify-content: center;

            color: #d4af37;
            font-family: 'Playfair Display', serif;
            font-size: 3.4rem;

            box-shadow:
                0 14px 28px rgba(0, 0, 0, 0.72),
                0 0 18px rgba(212, 175, 55, 0.12);
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        h1 {
            margin: 0;
            color: #d4af37;
            font-family: 'Playfair Display', serif;
            font-size: 2.4rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 0 4px 14px rgba(0, 0, 0, 0.9);
        }

        .role {
            margin-top: 8px;
            color: #9f842e;
            font-style: italic;
        }

        .profile-body {
            padding: 34px;
            border-top: 1px solid rgba(212, 175, 55, 0.16);
            background: rgba(0, 0, 0, 0.22);
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            margin-bottom: 30px;
        }

        .info-box {
            padding: 18px;
            border: 1px solid rgba(212, 175, 55, 0.18);
            border-radius: 12px;
            background: rgba(10, 5, 4, 0.58);
        }

        .info-label {
            display: block;
            margin-bottom: 8px;
            color: #9f842e;
            font-family: 'Playfair Display', serif;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .info-value {
            color: #f5eedc;
            line-height: 1.6;
        }

        .section-title {
            margin: 0 0 20px;
            color: #d4af37;
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .favorites-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(115px, 1fr));
            gap: 22px;
        }

        .fav-item {
            text-align: center;
        }

        .fav-spine {
            width: 78px;
            height: 112px;
            margin: 0 auto 10px;

            background:
                url("https://www.transparenttextures.com/patterns/leather.png"),
                linear-gradient(145deg, #581313 0%, #2a0605 55%, #120302 100%);

            border: 1px solid rgba(212, 175, 55, 0.45);
            border-radius: 4px 9px 9px 4px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #d4af37;
            font-family: 'Playfair Display', serif;
            font-size: 2rem;

            box-shadow: 0 12px 22px rgba(0, 0, 0, 0.58);
        }

        .fav-title {
            color: rgba(234, 217, 174, 0.86);
            font-size: 0.82rem;
            font-style: italic;
            line-height: 1.4;
        }

        .empty-state {
            padding: 28px;
            text-align: center;
            border: 1px dashed rgba(212, 175, 55, 0.24);
            border-radius: 12px;
            color: #9f842e;
            font-style: italic;
        }

        .bottom-links {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-top: 32px;
        }

        .bottom-links a {
            color: #d4af37;
            text-decoration: none;
            font-style: italic;
        }

        .bottom-links a:hover {
            color: #f5eedc;
        }

        @media (max-width: 700px) {
            body {
                padding: 45px 16px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 1.9rem;
            }

            .profile-body {
                padding: 26px 20px;
            }
        }
    </style>
</head>

<body>
    <main class="profile-card">
        <div class="banner"></div>

        <section class="profile-header">
            <div class="avatar">
                @if($user->profile_picture)
                    <img src="{{ asset('avatars/' . $user->profile_picture) }}" alt="{{ $user->getAttribute('username') }}">
                @else
                    ✧
                @endif
            </div>

            <h1>{{ $user->getAttribute('username') ?: 'Reader' }}</h1>

            <div class="role">
                {{ $user->is_admin ? 'Archive Curator' : 'Archive Reader' }}
            </div>
        </section>

        <section class="profile-body">
            <div class="info-grid">
                <div class="info-box">
                    <span class="info-label">Birthday</span>

                    <div class="info-value">
                        {{ $user->birthday ? $user->birthday->format('d/m/Y') : 'Not shared' }}
                    </div>
                </div>

                <div class="info-box">
                    <span class="info-label">Biography</span>

                    <div class="info-value">
                        {{ $user->bio ?: 'No biography has been written yet.' }}
                    </div>
                </div>
            </div>

            <h2 class="section-title">Favorite Manuscripts</h2>

            @if($user->favorites->count())
                <div class="favorites-grid">
                    @foreach($user->favorites as $book)
                        <div class="fav-item">
                            <div class="fav-spine">
                                {{ strtoupper(substr($book->title, 0, 1)) }}
                            </div>

                            <div class="fav-title">
                                {{ $book->title }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    This reader has not saved any favorite manuscripts yet.
                </div>
            @endif

            <div class="bottom-links">
                <a href="{{ route('index') }}">← Return to Archives</a>

                @auth
                    @if(auth()->id() === $user->id)
                        <a href="{{ route('profile') }}">Edit My Profile</a>
                    @endif
                @endauth
            </div>
        </section>
    </main>
</body>
</html>