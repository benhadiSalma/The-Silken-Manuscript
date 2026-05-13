<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Silken Manuscript</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Lora:ital@0;1&display=swap" rel="stylesheet">
    
    <style>
       * {
    box-sizing: border-box;
}

body {
    margin: 0;
    min-height: 100vh;
    overflow-x: hidden;
    font-family: 'Lora', serif;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 40px 20px;

    background:
        radial-gradient(circle at center, rgba(122, 87, 42, 0.18), transparent 42%),
        linear-gradient(135deg, #080504 0%, #1a0f0d 45%, #050303 100%);
    background-color: #080504;

    color: #2c1a1a;
}


body::before {
    content: "";
    position: fixed;
    width: 1150px;
    height: 760px;
    background: radial-gradient(circle, rgba(212, 175, 55, 0.09), transparent 65%);
    filter: blur(24px);
    z-index: -2;
}


body::after {
    content: "";
    position: fixed;
    inset: 0;
    background-image: url("https://www.transparenttextures.com/patterns/dark-wood.png");
    opacity: 0.35;
    pointer-events: none;
    z-index: -1;
}

.book {
    width: 950px;
    height: 650px;
    display: flex;
    position: relative;

    margin: auto;
    padding: 18px;

    background:
        radial-gradient(circle at top left, rgba(122, 74, 30, 0.35), transparent 35%),
        linear-gradient(145deg, #351407 0%, #1c0904 48%, #070302 100%);

    border-radius: 12px 24px 24px 12px;
    border: 2px solid #7d641e;

    box-shadow:
        0 50px 110px rgba(0, 0, 0, 0.92),
        0 20px 40px rgba(0, 0, 0, 0.78),
        inset 0 0 28px rgba(255, 214, 92, 0.08),
        inset 0 0 70px rgba(0, 0, 0, 0.72);
}


.book::after {
    content: "";
    position: absolute;
    inset: 9px;

    border: 1px solid rgba(212, 175, 55, 0.42);
    border-radius: 8px 18px 18px 8px;

    box-shadow:
        inset 0 0 14px rgba(212, 175, 55, 0.12),
        0 0 10px rgba(212, 175, 55, 0.08);

    pointer-events: none;
    z-index: 25;
}


.book::before {
    content: "";
    position: absolute;
    left: 50%;
    top: 18px;
    bottom: 18px;
    width: 30px;
    transform: translateX(-50%);
    z-index: 20;

    background:
        linear-gradient(
            to right,
            rgba(0, 0, 0, 0.55),
            rgba(255, 255, 255, 0.05),
            rgba(0, 0, 0, 0.58)
        );

    box-shadow:
        -14px 0 28px rgba(0, 0, 0, 0.32),
        14px 0 28px rgba(0, 0, 0, 0.32);

    pointer-events: none;
}


.page {
    flex: 1;
    padding: 62px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;

    background-color: #ead9ae;
    background-image:
        url("https://www.transparenttextures.com/patterns/parchment.png"),
        radial-gradient(circle at center, rgba(255, 250, 219, 0.65), transparent 58%),
        linear-gradient(135deg, #f3e6c3 0%, #dfcfa1 55%, #c8ad78 100%);

    outline: 1px solid rgba(139, 105, 32, 0.58);
    outline-offset: -18px;

    overflow: hidden;
}


.page::before {
    content: "";
    position: absolute;
    inset: 0;

    background:
        radial-gradient(circle at top left, rgba(255, 255, 255, 0.26), transparent 38%),
        radial-gradient(circle at bottom right, rgba(70, 38, 17, 0.22), transparent 42%),
        linear-gradient(to bottom, rgba(0, 0, 0, 0.03), rgba(0, 0, 0, 0.14));

    pointer-events: none;
    z-index: 1;
}


.page::after {
    content: "";
    position: absolute;
    inset: 24px;

    border: 1px solid rgba(166, 124, 32, 0.4);

    box-shadow:
        inset 0 0 14px rgba(89, 56, 19, 0.18),
        0 0 5px rgba(255, 241, 170, 0.18);

    pointer-events: none;
    z-index: 2;
}


.page > * {
    position: relative;
    z-index: 3;
}


.left-page {
    border-radius: 6px 0 0 6px;
    text-align: right;
    align-items: flex-end;

    box-shadow:
        inset -38px 0 50px rgba(58, 32, 13, 0.32),
        inset 8px 0 18px rgba(255, 255, 255, 0.14);
}


.right-page {
    border-radius: 0 14px 14px 0;
    text-align: left;
    align-items: flex-start;

    box-shadow:
        inset 38px 0 50px rgba(58, 32, 13, 0.32),
        inset -8px 0 18px rgba(255, 255, 255, 0.11);
}


h1 {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    line-height: 1.1;

    color: #24120b;

    margin: 0 0 24px 0;
    padding-bottom: 14px;

    text-transform: uppercase;
    letter-spacing: 5px;

    border-bottom: 2px solid rgba(139, 105, 32, 0.75);

    text-shadow:
        0 1px 0 rgba(255, 245, 190, 0.85),
        0 4px 10px rgba(61, 35, 16, 0.28);
}

.quote {
    max-width: 360px;

    font-style: italic;
    font-size: 1.35rem;
    line-height: 1.9;

    color: #4b3325;

    text-shadow: 0 1px 0 rgba(255, 247, 215, 0.6);
}


.flourish {
    margin-top: 28px;

    font-size: 2.2rem;
    color: #8c6f22;

    text-shadow:
        0 0 8px rgba(212, 175, 55, 0.28),
        0 2px 5px rgba(0, 0, 0, 0.2);
}


.intro-text {
    max-width: 390px;

    font-size: 1.08rem;
    line-height: 1.9;

    color: #342116;

    margin-bottom: 42px;
}


.btn-enter {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 16px 38px;

    border: 1px solid rgba(212, 175, 55, 0.85);
    background:
        linear-gradient(145deg, #2c120b 0%, #130705 100%);

    color: #d6b85a;

    font-family: 'Lora', serif;
    font-size: 0.82rem;
    font-weight: bold;

    text-transform: uppercase;
    letter-spacing: 3px;
    text-decoration: none;

    cursor: pointer;

    box-shadow:
        0 10px 24px rgba(0, 0, 0, 0.42),
        inset 0 0 12px rgba(212, 175, 55, 0.08);

    transition:
        transform 0.8s ease,
        

    will-change: transform;
}

/* Bordure interne du bouton */
.btn-enter::before {
    content: "";
    position: absolute;
    inset: 5px;

    border: 1px solid rgba(212, 175, 55, 0.35);

    pointer-events: none;
}

/* Hover propre sans bug */
.btn-enter:hover {
    transform: translateY(-2px);

    background:
        linear-gradient(145deg, #d4af37 0%, #9c7b22 100%);

    color: #1a0d08;

    box-shadow:
        0 14px 32px rgba(0, 0, 0, 0.55),
        0 0 18px rgba(212, 175, 55, 0.22);
}

.btn-enter:active {
    transform: translateY(0);
}

/* Responsive tablette */
@media (max-width: 1000px) {
    .book {
        width: 90vw;
        height: 620px;
    }

    .page {
        padding: 45px;
    }

    h1 {
        font-size: 2.3rem;
    }

    .quote {
        font-size: 1.15rem;
    }
}

/* Responsive mobile */
@media (max-width: 750px) {
    body {
        min-height: 100vh;
        padding: 30px 0;
        overflow-y: auto;
    }

    .book {
        width: 90vw;
        height: auto;
        flex-direction: column;
    }

    .book::before {
        display: none;
    }

    .left-page,
    .right-page {
        border-radius: 6px;
        text-align: center;
        align-items: center;
    }

    .page {
        min-height: 380px;
        padding: 42px 30px;
    }

    h1 {
        font-size: 2rem;
        letter-spacing: 3px;
    }

    .intro-text,
    .quote {
        max-width: 100%;
    }
}
    </style>
</head>
<body>

    <div class="book">
        <div class="page left-page">
            <p class="quote">
                "Step into the whispers of the archives. <br>
                Here, every page is a legacy, <br>
                and every ink drop a secret <br>
                waiting to be unraveled."
            </p>
            <div class="flourish">❦</div>
        </div>

        <div class="page right-page">
            <h1>The Silken Manuscript</h1>
            <p class="intro-text">
                Welcome, seeker of stories. You have reached the private collection of the world's most exquisite narratives. Explore, debate, and find your next obsession within our velvet bindings.
            </p>
            <a href="/index" class="btn-enter">Open the Archive</a>
            
        </div>
    </div>

</body>
</html>