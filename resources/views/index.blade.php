<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Archives - The Silken Manuscript</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Lora:ital@0;1&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Lora', serif;
            color: #ead9ae;
            padding: 55px 35px 80px;

            background:
                radial-gradient(circle at top, rgba(173, 124, 54, 0.16), transparent 35%),
                linear-gradient(135deg, #070403 0%, #160d0b 45%, #030202 100%);
            background-color: #070403;
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
                radial-gradient(circle at center, transparent 45%, rgba(0, 0, 0, 0.65) 100%);
            pointer-events: none;
            z-index: -1;
        }

        .header {
            text-align: center;
            margin-bottom: 70px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.6rem;
            color: #d4af37;
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
            color: #9f842e;
            margin-top: 16px;
            letter-spacing: 1px;
        }

        .library-section {
            max-width: 1220px;
            margin: 0 auto;
            padding: 35px 28px 60px;

            background:
                linear-gradient(90deg, rgba(0,0,0,0.55), rgba(255,255,255,0.02), rgba(0,0,0,0.55)),
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
                linear-gradient(180deg, rgba(255,255,255,0.03), rgba(0,0,0,0.32));
            border-radius: 6px;

            box-shadow:
                inset 0 30px 35px rgba(0, 0, 0, 0.32),
                inset 0 -18px 25px rgba(0, 0, 0, 0.55);
        }

        .shelf:last-child {
            margin-bottom: 0;
        }

        /* Planche de l’étagère */
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

        /* Bord doré de l’étagère */
        .shelf::after {
            content: "";
            position: absolute;
            left: 36px;
            right: 36px;
            bottom: 62px;
            height: 2px;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(212, 175, 55, 0.55),
                    rgba(255, 237, 160, 0.4),
                    rgba(212, 175, 55, 0.55),
                    transparent
                );

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

            background:
                linear-gradient(90deg, rgba(0,0,0,0.28), transparent 18%, rgba(255,255,255,0.05) 45%, rgba(0,0,0,0.32)),
                linear-gradient(145deg, #581313 0%, #2a0605 55%, #120302 100%);
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
                linear-gradient(
                    to bottom,
                    transparent,
                    rgba(212, 175, 55, 0.45),
                    transparent
                );

            box-shadow:
                70px 0 0 rgba(212, 175, 55, 0.14);
            opacity: 0.65;
        }

        .book-title {
            position: relative;
            z-index: 2;

            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            line-height: 1.35;

            color: #d6b85a;
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
            color: #ead9ae;
            opacity: 0.82;
            text-align: center;

            text-shadow: 0 2px 6px rgba(0,0,0,0.8);
        }

        .empty-shelf {
            grid-column: 1 / -1;
            align-self: center;
            justify-self: center;

            padding: 50px 30px;

            color: #9f842e;
            font-style: italic;
            font-size: 1.2rem;
            text-align: center;

            border: 1px dashed rgba(212, 175, 55, 0.24);
            border-radius: 8px;
            background: rgba(0, 0, 0, 0.22);
        }

        /* Variations de livres pour éviter l’effet répétitif */
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

        @media (max-width: 1100px) {
            .shelf {
                grid-template-columns: repeat(4, minmax(130px, 1fr));
            }
        }

        @media (max-width: 850px) {
            body {
                padding: 45px 18px 70px;
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
        }
    </style>
</head>

<body>

  <nav class="archive-navbar">
    <div class="nav-left">
        <h1 class="archive-title">The Silken Manuscript</h1>
    </div>

    <!-- SEARCH & FILTERING -->
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

    <!-- AUTHENTICATION / PROFILE -->
    <div class="nav-right">
        @guest
            <a href="{{ route('login') }}" class="nav-link">Login</a>
            <a href="{{ route('register') }}" class="nav-btn-gold">Sign Up</a>
        @endguest

        @auth
            <span class="scribe-greeting">Scribe {{ auth()->user()->username ?? auth()->user()->name }}</span>
            <a href="#" class="nav-link">My Profile</a>
            
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="nav-link logout-btn">Logout</button>
            </form>
        @endauth
    </div>
</nav>
        <h1>The Archives</h1>
        <div class="subtitle">Where silken threads bind forgotten lore.</div>
    </div>


    
    <div class="library-section">
        <div class="library-frame">

           
            @forelse($books->chunk(5) as $row)
                <div class="shelf">
                    @foreach($row as $book)
                        <div class="book-item">
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

        </div>
    </div>

</body>
</html>