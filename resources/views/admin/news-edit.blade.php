<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Chronicle - The Silken Manuscript</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Lora:ital@0;1&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: #070403;
            font-family: 'Lora', serif;
            color: #d4b16a;
        }

        body {
            overflow-x: hidden;
        }

        .edit-page {
            position: relative;
            min-height: 100vh;
            padding: 70px 24px 90px;

            background:
                radial-gradient(circle at top, rgba(212, 175, 55, 0.16), transparent 34%),
                radial-gradient(circle at center, rgba(122, 32, 33, 0.1), transparent 52%),
                linear-gradient(135deg, #050302 0%, #160d0b 45%, #030202 100%);
        }

        .edit-page::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url("https://www.transparenttextures.com/patterns/dark-wood.png");
            opacity: 0.32;
            pointer-events: none;
            z-index: 0;
        }

        .edit-page::after {
            content: "";
            position: fixed;
            inset: 0;
            background: radial-gradient(circle at center, transparent 38%, rgba(0, 0, 0, 0.72) 100%);
            pointer-events: none;
            z-index: 1;
        }

        .edit-container {
            position: relative;
            z-index: 2;
            max-width: 880px;
            margin: 0 auto;
        }

        .edit-card {
            position: relative;
            padding: 58px 54px;

            background:
                linear-gradient(145deg, rgba(20, 10, 8, 0.97), rgba(8, 4, 3, 0.99)),
                url("https://www.transparenttextures.com/patterns/leather.png");

            border: 1px solid rgba(212, 177, 106, 0.38);
            border-radius: 18px;

            box-shadow:
                0 36px 90px rgba(0, 0, 0, 0.9),
                inset 0 0 34px rgba(212, 175, 55, 0.04);
        }

        .edit-card::before {
            content: "";
            position: absolute;
            inset: 14px;
            border: 1px double rgba(212, 177, 106, 0.22);
            border-radius: 12px;
            pointer-events: none;
        }

        .edit-header {
            position: relative;
            z-index: 2;
            text-align: center;
            margin-bottom: 40px;
        }

        .edit-kicker {
            margin-bottom: 12px;
            color: #9b2b2b;
            font-family: 'Playfair Display', serif;
            font-size: 0.82rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 4px;
        }

        .edit-title {
            margin: 0;
            color: #d4b16a;
            font-family: 'Playfair Display', serif;
            font-size: 2.7rem;
            line-height: 1.1;
            text-transform: uppercase;
            letter-spacing: 4px;
            text-shadow:
                0 4px 14px rgba(0, 0, 0, 0.9),
                0 0 16px rgba(212, 175, 55, 0.14);
        }

        .edit-subtitle {
            max-width: 580px;
            margin: 18px auto 0;
            color: rgba(234, 217, 174, 0.78);
            font-size: 1rem;
            font-style: italic;
            line-height: 1.7;
        }

        .edit-form {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .form-label {
            color: #d6b85a;
            font-family: 'Playfair Display', serif;
            font-size: 0.95rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.7px;
        }

        .form-input,
        .form-textarea {
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
            transition:
                border-color 0.25s ease,
                background 0.25s ease,
                box-shadow 0.25s ease;
        }

        .form-textarea {
            resize: vertical;
            min-height: 230px;
            line-height: 1.7;
        }

        .form-input:focus,
        .form-textarea:focus {
            border-color: rgba(212, 177, 106, 0.85);
            background: rgba(20, 10, 8, 0.94);
            box-shadow:
                inset 0 3px 8px rgba(0, 0, 0, 0.58),
                0 0 18px rgba(212, 175, 55, 0.1);
        }

        .current-image-box {
            padding: 18px;
            background: rgba(10, 5, 4, 0.52);
            border: 1px solid rgba(212, 177, 106, 0.22);
            border-radius: 10px;
        }

        .current-image {
            display: block;
            width: 100%;
            max-width: 300px;
            height: 190px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid rgba(212, 175, 55, 0.35);
            box-shadow: 0 12px 26px rgba(0, 0, 0, 0.5);
        }

        .file-input {
            width: 100%;
            padding: 13px;
            background: rgba(10, 5, 4, 0.88);
            border: 1px dashed rgba(212, 177, 106, 0.45);
            border-radius: 7px;
            color: #d4b16a;
            font-family: 'Lora', serif;
            cursor: pointer;
        }

        .file-input::file-selector-button {
            margin-right: 14px;
            padding: 8px 14px;
            background:
                radial-gradient(circle at 35% 30%, #9b2b2b, #5a1111 68%, #250505 100%);
            color: #f5df9d;
            border: 1px solid rgba(212, 177, 106, 0.58);
            border-radius: 999px;
            font-family: 'Playfair Display', serif;
            font-weight: bold;
            letter-spacing: 1px;
            cursor: pointer;
        }

        .error-message {
            color: #ff8a8a;
            font-size: 0.85rem;
            font-style: italic;
        }

        .form-actions {
            display: grid;
            gap: 14px;
            margin-top: 8px;
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
            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                filter 0.25s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            filter: brightness(1.06);
            box-shadow:
                0 16px 30px rgba(0, 0, 0, 0.68),
                0 0 18px rgba(212, 175, 55, 0.16),
                inset 0 0 12px rgba(255, 248, 210, 0.22);
        }

        .back-link {
            text-align: center;
            color: #d4b16a;
            text-decoration: none;
            font-size: 0.95rem;
            font-style: italic;
        }

        .back-link:hover {
            color: #f5df9d;
            text-shadow: 0 0 10px rgba(212, 175, 55, 0.22);
        }

        @media (max-width: 720px) {
            .edit-page {
                padding: 45px 16px 70px;
            }

            .edit-card {
                padding: 42px 26px;
            }

            .edit-title {
                font-size: 2rem;
                letter-spacing: 2.5px;
            }

            .edit-subtitle {
                font-size: 0.95rem;
            }
        }
    </style>
</head>

<body>
    <main class="edit-page">
        <div class="edit-container">
            <section class="edit-card">
                <header class="edit-header">
                    <div class="edit-kicker">Curator’s Revision</div>

                    <h1 class="edit-title">
                        Edit Chronicle
                    </h1>

                    <p class="edit-subtitle">
                        Refine this official announcement before returning it to the archive.
                    </p>
                </header>

                <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="edit-form">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title" class="form-label">Title of the Decree</label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $news->title) }}"
                            required
                            maxlength="255"
                            class="form-input"
                        >

                        @error('title')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content" class="form-label">Imperial Content</label>

                        <textarea
                            id="content"
                            name="content"
                            rows="10"
                            required
                            class="form-textarea"
                        >{{ old('content', $news->content) }}</textarea>

                        @error('content')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    @if($news->image)
                        <div class="form-group current-image-box">
                            <label class="form-label">Current Image</label>

                            <img
                                src="{{ asset('storage/' . $news->image) }}"
                                alt="{{ $news->title }}"
                                class="current-image"
                            >
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="image" class="form-label">Replace Image</label>

                        <input
                            id="image"
                            type="file"
                            name="image"
                            accept="image/jpeg,image/png,image/webp"
                            class="file-input"
                        >

                        @error('image')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="submit-btn">
                            Update Chronicle
                        </button>

                        <a href="{{ route('news.show', $news) }}" class="back-link">
                            ← Back to Chronicle
                        </a>
                    </div>
                </form>
            </section>
        </div>
    </main>
</body>
</html>