<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive Rules - The Silken Manuscript</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Lora:ital@0;1&display=swap" rel="stylesheet">

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
        }

        body {
            color: #2a1309;
            overflow-x: hidden;
        }

        .royal-page {
            position: relative;
            min-height: 100vh;
            width: 100%;
            padding: 70px 24px 100px;

            background:
                radial-gradient(circle at top, rgba(212, 175, 55, 0.14), transparent 36%),
                radial-gradient(circle at center, rgba(122, 32, 33, 0.08), transparent 52%),
                linear-gradient(135deg, #050302 0%, #120907 38%, #1a0c08 58%, #080303 100%);

            overflow: hidden;
        }

        .royal-page::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url("https://www.transparenttextures.com/patterns/dark-wood.png");
            opacity: 0.32;
            pointer-events: none;
            z-index: 0;
        }

        .royal-page::after {
            content: "";
            position: fixed;
            inset: 0;
            background:
                radial-gradient(circle at center, transparent 38%, rgba(0, 0, 0, 0.72) 100%);
            pointer-events: none;
            z-index: 1;
        }

        .royal-content {
            position: relative;
            z-index: 3;
            max-width: 1400px;
            margin: 0 auto;
        }

        .top-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
            margin-bottom: 42px;
        }

        .top-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 14px 28px;

            background:
                radial-gradient(circle at 35% 30%, #a42a2a, #641212 65%, #290606 100%);

            color: #f5df9d;
            text-decoration: none;

            border: 1px solid rgba(212, 175, 55, 0.75);
            border-radius: 999px;

            font-family: 'Playfair Display', serif;
            font-size: 0.9rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;

            box-shadow:
                0 10px 24px rgba(0, 0, 0, 0.55),
                inset 0 0 10px rgba(255, 230, 150, 0.1);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                filter 0.25s ease;
        }

        .top-btn:hover {
            transform: translateY(-3px);
            filter: brightness(1.08);
            box-shadow:
                0 16px 30px rgba(0, 0, 0, 0.68),
                0 0 18px rgba(212, 175, 55, 0.18);
        }

        .royal-stage {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 980px;
        }

        .trumpet-wrap {
            position: absolute;
            top: 110px;
            width: 250px;
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 5;
        }

        .trumpet-wrap.left {
            left: 20px;
        }

        .trumpet-wrap.right {
            right: 20px;
        }

        .royal-trumpet {
            font-size: 9.5rem;
            line-height: 1;
            filter:
                drop-shadow(0 12px 20px rgba(0, 0, 0, 0.7))
                drop-shadow(0 0 12px rgba(212, 175, 55, 0.22))
                drop-shadow(0 0 26px rgba(255, 218, 120, 0.08));
        }

        .trumpet-wrap.left .royal-trumpet {
            transform: rotate(-14deg) scaleX(-1);
        }

        .trumpet-wrap.right .royal-trumpet {
            transform: rotate(14deg);
        }

        .royal-banner {
            position: relative;
            margin-top: -12px;

            width: 74px;
            height: 160px;

            background:
                linear-gradient(180deg, #a51f26 0%, #7a1218 34%, #4a080d 70%, #230305 100%);

            border: 1px solid rgba(212, 175, 55, 0.82);

            box-shadow:
                0 16px 28px rgba(0, 0, 0, 0.62),
                inset 0 0 14px rgba(255, 232, 180, 0.07),
                inset 0 -16px 18px rgba(0, 0, 0, 0.24);
        }

        .royal-banner::before {
            content: "✦";
            position: absolute;
            top: 15px;
            left: 50%;
            transform: translateX(-50%);

            color: #f4d57a;
            font-size: 1.25rem;

            text-shadow:
                0 0 10px rgba(255, 220, 120, 0.4),
                0 2px 5px rgba(0, 0, 0, 0.6);
        }

        .royal-banner::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -1px;
            transform: translateX(-50%);

            width: 0;
            height: 0;

            border-left: 36px solid transparent;
            border-right: 36px solid transparent;
            border-bottom: 34px solid #140707;
        }

        .scroll-wrapper {
            width: 100%;
            max-width: 780px;
            position: relative;
            z-index: 4;
        }

        .vertical-scroll {
            position: relative;
            width: 100%;
            min-height: 1080px;

            padding: 92px 62px 92px;

            background:
                radial-gradient(circle at center, rgba(255, 250, 225, 0.65), transparent 62%),
                linear-gradient(180deg, #ead8a8 0%, #d8bc78 18%, #f1e0b4 48%, #d3af67 82%, #c79b52 100%);

            border-left: 2px solid rgba(95, 62, 21, 0.78);
            border-right: 2px solid rgba(95, 62, 21, 0.78);

            box-shadow:
                0 38px 85px rgba(0, 0, 0, 0.72),
                inset 0 0 28px rgba(92, 55, 18, 0.22),
                inset 0 0 90px rgba(255, 247, 215, 0.14);

            text-align: center;
        }

        .vertical-scroll::before,
        .vertical-scroll::after {
            content: "";
            position: absolute;
            left: 50%;

            width: 108%;
            height: 46px;

            transform: translateX(-50%);

            background:
                linear-gradient(90deg, #8a5a22 0%, #f1dca3 30%, #c09346 50%, #f1dca3 70%, #8a5a22 100%);

            border: 2px solid rgba(76, 45, 13, 0.78);
            border-radius: 999px;

            box-shadow:
                0 12px 24px rgba(0, 0, 0, 0.58),
                inset 0 0 14px rgba(0, 0, 0, 0.28);
        }

        .vertical-scroll::before {
            top: -26px;
        }

        .vertical-scroll::after {
            bottom: -26px;
        }

        .scroll-topline {
            margin-bottom: 16px;

            color: #8f2a2a;

            font-family: 'Playfair Display', serif;
            font-size: 0.9rem;
            font-weight: bold;
            letter-spacing: 4px;
            text-transform: uppercase;
        }

        .scroll-title {
            margin: 0;

            color: #2b140b;

            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            line-height: 1.12;
            text-transform: uppercase;
            letter-spacing: 4px;

            text-shadow: 0 1px 0 rgba(255, 245, 203, 0.85);
        }

        .scroll-subtitle {
            max-width: 560px;
            margin: 20px auto 34px;

            color: #6a4a1f;

            font-size: 1.05rem;
            font-style: italic;
            line-height: 1.75;
        }

        .scroll-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 26px;
            flex-wrap: wrap;

            margin-bottom: 30px;
        }

        .scroll-link {
            position: relative;

            color: #3a1d0d;
            text-decoration: none;

            font-family: 'Playfair Display', serif;
            font-size: 0.92rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.7px;

            background: transparent;
            border: none;
            cursor: pointer;

            padding: 8px 4px;
        }

        .scroll-link::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 2px;

            width: 0;
            height: 1px;

            background: #8f2a2a;

            transform: translateX(-50%);
            transition: width 0.25s ease;
        }

        .scroll-link:hover::after,
        .scroll-link.active::after {
            width: 100%;
        }

        .scroll-link:hover,
        .scroll-link.active {
            color: #8f2a2a;
        }

        .scroll-divider {
            width: 88%;
            height: 1px;
            margin: 0 auto 30px;

            background:
                linear-gradient(to right, transparent, rgba(120, 78, 24, 0.55), transparent);
        }

        .rule-list {
            display: grid;
            gap: 24px;
            margin-top: 10px;
        }

        .rule-card {
            padding: 25px 28px;

            background:
                linear-gradient(145deg, rgba(255, 250, 235, 0.3), rgba(125, 84, 28, 0.08));

            border: 1px solid rgba(117, 78, 29, 0.34);
            border-radius: 12px;

            box-shadow:
                inset 0 0 12px rgba(120, 78, 24, 0.08),
                0 10px 20px rgba(0, 0, 0, 0.08);

            text-align: left;
        }

        .rule-badge {
            display: inline-block;

            margin-bottom: 12px;

            color: #8f2a2a;

            font-family: 'Playfair Display', serif;
            font-size: 0.78rem;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .rule-card h3 {
            margin: 0 0 10px;

            color: #2b140b;

            font-family: 'Playfair Display', serif;
            font-size: 1.45rem;
            line-height: 1.3;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .rule-card p {
            margin: 0;

            color: #5d4325;

            font-size: 1rem;
            line-height: 1.8;
        }

        .bottom-note {
            margin-top: 36px;

            color: #7a5a28;

            font-size: 0.95rem;
            font-style: italic;
            text-align: center;
        }

        @media (max-width: 1220px) {
            .trumpet-wrap.left {
                left: -20px;
            }

            .trumpet-wrap.right {
                right: -20px;
            }

            .royal-trumpet {
                font-size: 7.6rem;
            }

            .royal-banner {
                width: 62px;
                height: 138px;
            }
        }

        @media (max-width: 1000px) {
            .trumpet-wrap {
                display: none;
            }

            .scroll-wrapper {
                max-width: 760px;
            }
        }

        @media (max-width: 720px) {
            .royal-page {
                padding: 48px 14px 80px;
            }

            .vertical-scroll {
                min-height: auto;
                padding: 72px 28px 78px;
            }

            .scroll-title {
                font-size: 2.1rem;
                letter-spacing: 2.5px;
            }

            .scroll-subtitle {
                font-size: 0.98rem;
            }

            .top-actions,
            .scroll-nav {
                gap: 12px;
            }

            .top-btn {
                width: 100%;
                max-width: 340px;
            }

            .rule-card {
                padding: 22px 20px;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="royal-page">
        <div class="royal-content">

            <div class="top-actions">
                <a href="{{ route('index') }}" class="top-btn">
                    Return to Archives
                </a>

                <a href="{{ route('news.index') }}" class="top-btn">
                    Read Chronicles
                </a>
            </div>

            <div class="royal-stage">
                <div class="trumpet-wrap left">
                    <span class="royal-trumpet">📯</span>
                    <span class="royal-banner"></span>
                </div>

                <div class="scroll-wrapper">
                    <main class="vertical-scroll">
                        <div class="scroll-topline">Official Conduct</div>

                        <h1 class="scroll-title">Rules of the Archive</h1>

                        <p class="scroll-subtitle">
                            Every reader entering The Silken Manuscript agrees to respect the collection,
                            the community, and the quiet dignity of the archive.
                        </p>

                        <nav class="scroll-nav">
                            <a href="{{ route('index') }}" class="scroll-link">
                                Archives
                            </a>

                            <a href="{{ route('news.index') }}" class="scroll-link">
                                Chronicles
                            </a>

                            <a href="{{ route('rules.index') }}" class="scroll-link active">
                                Rules
                            </a>
                        </nav>

                        <div class="scroll-divider"></div>

                        <div class="rule-list">
                            <article class="rule-card">
                                <span class="rule-badge">Rule I</span>
                                <h3>Respect the Manuscripts</h3>
                                <p>
                                    Every book in the archive must be treated as a preserved record.
                                    Readers are invited to explore, save favorites, and discuss stories,
                                    but never to misuse the collection or disturb its purpose.
                                </p>
                            </article>

                            <article class="rule-card">
                                <span class="rule-badge">Rule II</span>
                                <h3>Speak with Care</h3>
                                <p>
                                    Public whispers, comments, and discussions must remain respectful.
                                    The archive welcomes curiosity, disagreement, and interpretation,
                                    but not insults, harassment, or deliberate disruption.
                                </p>
                            </article>

                            <article class="rule-card">
                                <span class="rule-badge">Rule III</span>
                                <h3>Protect Your Identity</h3>
                                <p>
                                    Readers may choose their archive pseudonym and public profile details.
                                    Personal information should only be shared with care, and every visitor
                                    remains responsible for the traces they leave behind.
                                </p>
                            </article>

                            <article class="rule-card">
                                <span class="rule-badge">Rule IV</span>
                                <h3>Curators Hold the Seal</h3>
                                <p>
                                    Only appointed curators may publish chronicles, manage records,
                                    edit manuscripts, or maintain the structure of the archive.
                                    Readers may explore the halls, while curators preserve them.
                                </p>
                            </article>
                        </div>

                        <div class="bottom-note">
                            Sealed for every reader of The Silken Manuscript.
                        </div>
                    </main>
                </div>

                <div class="trumpet-wrap right">
                    <span class="royal-trumpet">📯</span>
                    <span class="royal-banner"></span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>