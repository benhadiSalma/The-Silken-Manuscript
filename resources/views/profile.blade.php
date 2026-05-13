<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ auth()->user()->name }}'s Record - The Silken Manuscript</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Lora:ital@0;1&display=swap" rel="stylesheet">
    
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0; min-height: 100vh; padding: 55px 24px;
            display: flex; flex-direction: column; align-items: center;
            font-family: 'Lora', serif; color: #ead9ae;
            background: radial-gradient(circle at top, rgba(173, 124, 54, 0.16), transparent 35%), linear-gradient(135deg, #070403 0%, #160d0b 45%, #030202 100%);
            background-color: #070403;
        }
        
        /* La carte type Discord */
        .discord-card {
            width: 100%; max-width: 600px;
            background: linear-gradient(145deg, rgba(20, 10, 8, 0.96), rgba(8, 4, 3, 0.98));
            border: 1px solid rgba(212, 175, 55, 0.32);
            border-radius: 12px; overflow: hidden;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.85);
            margin-top: 20px;
        }

        /* La Bannière */
        .card-banner {
            height: 140px; width: 100%;
            background: linear-gradient(145deg, #3a0d0d 0%, #1a0505 100%);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        /* L'en-tête du profil avec l'avatar qui chevauche */
        .card-header {
            padding: 0 30px;
            position: relative;
            display: flex; flex-direction: column; align-items: center;
            margin-top: -65px; /* Fait remonter l'avatar sur la bannière */
        }

        .avatar-container {
            width: 130px; height: 130px;
            border-radius: 50%;
            border: 6px solid #0a0504; /* Bordure épaisse pour l'effet de découpe Discord */
            background: #160604;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 10px 20px rgba(0,0,0,0.6);
            overflow: hidden;
        }

        .avatar-img {
            width: 100%; height: 100%; object-fit: cover;
        }

        .avatar-placeholder {
            font-size: 3rem; color: #d4af37; font-family: 'Playfair Display', serif;
        }

        .username {
            font-family: 'Playfair Display', serif; font-size: 2rem; color: #d4af37;
            margin: 15px 0 5px; text-transform: uppercase; letter-spacing: 2px;
        }

        .current-bio {
            font-style: italic; color: #c4b490; text-align: center;
            margin-bottom: 25px; line-height: 1.6; max-width: 90%;
        }

        /* Le formulaire d'édition séparé par une ligne */
        .edit-section {
            padding: 30px; border-top: 1px dashed rgba(212, 175, 55, 0.2);
            background: rgba(0, 0, 0, 0.3);
        }

        .form-group { display: flex; flex-direction: column; margin-bottom: 20px; }
        label { font-family: 'Playfair Display', serif; color: #d6b85a; text-transform: uppercase; letter-spacing: 1px; font-size: 0.9rem; margin-bottom: 8px; }
        
        textarea, input[type="file"] {
            background: rgba(0, 0, 0, 0.5); border: 1px solid rgba(212, 175, 55, 0.3);
            color: #f5eedc; font-family: 'Lora', serif; padding: 12px; border-radius: 6px;
            outline: none; transition: border-color 0.3s;
        }
        textarea:focus { border-color: #d4af37; }
        
        input[type="file"]::file-selector-button {
            background: #1a0f0c; color: #d6b85a; border: 1px solid rgba(212, 175, 55, 0.3);
            padding: 6px 12px; border-radius: 4px; font-family: 'Playfair Display', serif; cursor: pointer; margin-right: 15px;
        }

        .nav-btn-gold {
            background: linear-gradient(145deg, #7a2021 0%, #4a1011 100%); color: #f5eedc;
            border: 1px solid #942b2c; padding: 12px; border-radius: 4px;
            font-family: 'Playfair Display', serif; text-transform: uppercase; letter-spacing: 2px;
            cursor: pointer; width: 100%; transition: all 0.3s; margin-top: 10px;
        }
        .nav-btn-gold:hover { transform: translateY(-2px); border-color: #d4af37; }
        .back-link { margin-top: 30px; color: #9f842e; text-decoration: none; font-style: italic; }
    </style>
</head>
<body>

    <div class="discord-card">
        <!-- Bannière -->
        <div class="card-banner"></div>

        <!-- En-tête -->
        <div class="card-header">
            <div class="avatar-container">
                @if(auth()->user()->profile_picture)
                    <img src="{{ asset('avatars/' . auth()->user()->profile_picture) }}" alt="Avatar" class="avatar-img">
                @else
                    <div class="avatar-placeholder">✧</div>
                @endif
            </div>
            
            <div class="username">{{ auth()->user()->name }}</div>
            
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
                    <input type="file" id="profile_picture" name="profile_picture" accept="image/jpeg, image/png, image/webp">
                </div>

                <div class="form-group">
                    <label for="bio">Rewrite Biography</label>
                    <textarea id="bio" name="bio" rows="4" placeholder="Tell the archives of your tastes...">{{ auth()->user()->bio }}</textarea>
                </div>

                <button type="submit" class="nav-btn-gold">Seal the Record</button>
            </form>
        </div>
    </div>

    <a href="{{ url('/') }}" class="back-link">← Return to the library</a>

</body>
</html>