<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ auth()->user()->name }}'s Record - The Silken Manuscript</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Lora:ital@0;1&display=swap" rel="stylesheet">
    
    <style>
        /* Je te remets une base CSS rapide pour garder ton style sombre et doré */
        body {
            margin: 0; min-height: 100vh; padding: 55px 24px;
            display: flex; flex-direction: column; align-items: center;
            font-family: 'Lora', serif; color: #ead9ae;
            background-color: #070403;
            background-image: radial-gradient(circle at top, rgba(173, 124, 54, 0.16), transparent 35%);
        }
        h1 {
            font-family: 'Playfair Display', serif; font-size: 2.9rem;
            color: #d4af37; text-transform: uppercase; letter-spacing: 6px;
            margin: 0; text-shadow: 0 4px 16px rgba(0, 0, 0, 0.95);
        }
        .profile-display {
            width: 100%; max-width: 600px; padding: 50px;
            background: linear-gradient(145deg, rgba(42, 18, 10, 0.96), rgba(8, 4, 3, 0.98));
            border: 1px solid rgba(212, 175, 55, 0.32); border-radius: 14px;
            text-align: center; margin-top: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.72);
        }
        .avatar {
            width: 150px; height: 150px; border-radius: 50%; object-fit: cover;
            border: 2px solid rgba(212, 175, 55, 0.58);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.65); margin-bottom: 20px;
        }
        .portrait-placeholder {
            width: 150px; height: 150px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            background: radial-gradient(circle, #7a2416, #160604 100%);
            border: 2px solid rgba(212, 175, 55, 0.58);
            color: #d4af37; font-size: 3rem; margin: 0 auto 20px;
        }
        .bio-text {
            font-size: 1.1rem; line-height: 1.8; color: #f5eedc;
            background: rgba(0,0,0,0.4); padding: 20px; border-radius: 8px;
            border-left: 3px solid #d4af37; text-align: left;
            font-style: italic;
        }
        .action-links {
            margin-top: 30px; display: flex; justify-content: center; gap: 20px;
        }
        .action-links a {
            color: #9f842e; text-decoration: none; text-transform: uppercase;
            font-family: 'Playfair Display', serif; letter-spacing: 2px; font-size: 0.9rem;
        }
        .action-links a:hover { color: #d4af37; }
    </style>
</head>
<body>

    <h1>Scribe {{ auth()->user()->name }}</h1>

    <div class="profile-display">
        
        <!-- Logique d'affichage : Si le user a une photo on l'affiche, sinon on met un symbole -->
        @if(auth()->user()->profile_picture)
            <img src="{{ asset('avatars/' . auth()->user()->profile_picture) }}" alt="Avatar" class="avatar">
        @else
            <div class="portrait-placeholder">✧</div>
        @endif

        <!-- Affichage de la bio -->
        @if(auth()->user()->bio)
            <div class="bio-text">
                "{{ auth()->user()->bio }}"
            </div>
        @else
            <p style="color: rgba(234, 217, 174, 0.58); font-style: italic;">This scribe's lore remains unwritten...</p>
        @endif

        <div class="action-links">
            <a href="{{ route('profile') }}">Edit Profile</a>
            <a href="{{ url('/') }}">Return to Archives</a>
        </div>
    </div>

</body>
</html>