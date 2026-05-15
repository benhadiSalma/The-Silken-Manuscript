<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Command Chamber - The Silken Manuscript</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Lora:ital@0;1&display=swap"
        rel="stylesheet">

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

            overflow-x: hidden;
            overflow-y: visible;
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

        .admin-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
            margin-bottom: 42px;
        }

        .admin-btn {
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

            cursor: pointer;
        }

        .admin-btn:hover {
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
                drop-shadow(0 12px 20px rgba(0, 0, 0, 0.7)) drop-shadow(0 0 12px rgba(212, 175, 55, 0.22)) drop-shadow(0 0 26px rgba(255, 218, 120, 0.08));
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

        .scroll-link,
        .logout-btn {
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

        .scroll-link::after,
        .logout-btn::after {
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
        .logout-btn:hover::after,
        .scroll-link.active::after {
            width: 100%;
        }

        .scroll-link:hover,
        .logout-btn:hover,
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

        .user-row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;

            margin-bottom: 42px;
        }

        .reader-name {
            color: #68431d;

            font-family: 'Lora', serif;
            font-size: 1rem;
            font-style: italic;
        }

        .pill-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 11px 22px;

            background:
                radial-gradient(circle at 35% 30%, #9b2b2b, #5a1111 68%, #250505 100%);

            color: #f5df9d;
            text-decoration: none;

            border: 1px solid rgba(94, 28, 28, 0.95);
            border-radius: 999px;

            font-family: 'Playfair Display', serif;
            font-size: 0.84rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.6px;

            box-shadow:
                0 8px 18px rgba(0, 0, 0, 0.35),
                inset 0 0 8px rgba(255, 230, 150, 0.1);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .pill-btn:hover {
            transform: translateY(-2px);
            box-shadow:
                0 12px 22px rgba(0, 0, 0, 0.42),
                0 0 14px rgba(122, 32, 33, 0.16);
        }

        .logout-form {
            margin: 0;
        }

        .announcement-list {
            display: grid;
            gap: 24px;
            margin-top: 10px;
        }

        .announcement-card {
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

        .announcement-badge {
            display: inline-block;

            margin-bottom: 12px;

            color: #8f2a2a;

            font-family: 'Playfair Display', serif;
            font-size: 0.78rem;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .announcement-card h3 {
            margin: 0 0 10px;

            color: #2b140b;

            font-family: 'Playfair Display', serif;
            font-size: 1.45rem;
            line-height: 1.3;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .announcement-card p {
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

        /* MODALS */
        .royal-modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 999;

            display: none;
            align-items: center;
            justify-content: center;

            padding: 28px;

            background:
                radial-gradient(circle at center, rgba(212, 175, 55, 0.08), transparent 38%),
                rgba(0, 0, 0, 0.86);

            backdrop-filter: blur(7px);
        }

        .royal-modal-overlay.is-open {
            display: flex;
        }

        .royal-modal {
            width: 100%;
            max-width: 560px;
            position: relative;

            padding: 44px 42px;

            background:
                radial-gradient(circle at center, rgba(255, 250, 225, 0.68), transparent 62%),
                linear-gradient(180deg, #ead8a8 0%, #f1e0b4 48%, #c79b52 100%);

            border: 2px solid rgba(95, 62, 21, 0.78);
            border-radius: 18px;

            box-shadow:
                0 36px 90px rgba(0, 0, 0, 0.8),
                inset 0 0 28px rgba(92, 55, 18, 0.22),
                inset 0 0 80px rgba(255, 247, 215, 0.16);

            text-align: center;
        }

        .royal-modal::before,
        .royal-modal::after {
            content: "";
            position: absolute;
            left: 50%;

            width: 104%;
            height: 34px;

            transform: translateX(-50%);

            background:
                linear-gradient(90deg, #8a5a22 0%, #f1dca3 30%, #c09346 50%, #f1dca3 70%, #8a5a22 100%);

            border: 2px solid rgba(76, 45, 13, 0.78);
            border-radius: 999px;

            box-shadow:
                0 10px 20px rgba(0, 0, 0, 0.48),
                inset 0 0 12px rgba(0, 0, 0, 0.24);
        }

        .royal-modal::before {
            top: -18px;
        }

        .royal-modal::after {
            bottom: -18px;
        }

        .modal-close {
            position: absolute;
            top: 16px;
            right: 20px;

            background: transparent;
            border: none;

            color: #7a2021;

            font-size: 1.9rem;
            line-height: 1;

            cursor: pointer;

            transition:
                transform 0.25s ease,
                color 0.25s ease;
        }

        .modal-close:hover {
            transform: rotate(90deg);
            color: #2b140b;
        }

        .modal-kicker {
            margin-bottom: 10px;

            color: #8f2a2a;

            font-family: 'Playfair Display', serif;
            font-size: 0.78rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .modal-title {
            margin: 0;

            color: #2b140b;

            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            line-height: 1.1;

            text-transform: uppercase;
            letter-spacing: 2.5px;
        }

        .modal-text {
            max-width: 430px;

            margin: 18px auto 28px;

            color: #5d4325;

            font-size: 0.98rem;
            font-style: italic;
            line-height: 1.7;
        }

        .modal-actions {
            display: grid;
            gap: 14px;
        }

        .modal-action-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            width: 100%;

            padding: 14px 20px;

            background:
                radial-gradient(circle at 35% 30%, #9b2b2b, #5a1111 68%, #250505 100%);

            color: #f5df9d;
            text-decoration: none;

            border: 1px solid rgba(212, 175, 55, 0.76);
            border-radius: 999px;

            font-family: 'Playfair Display', serif;
            font-size: 0.86rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 1.7px;

            box-shadow:
                0 8px 18px rgba(0, 0, 0, 0.42),
                inset 0 0 8px rgba(255, 230, 150, 0.1);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                filter 0.25s ease;
        }

        .modal-action-link:hover {
            transform: translateY(-2px);
            filter: brightness(1.08);

            box-shadow:
                0 12px 24px rgba(0, 0, 0, 0.55),
                0 0 16px rgba(122, 32, 33, 0.18);
        }

        .modal-secondary-link {
            color: #3a1d0d;
            text-decoration: none;

            font-family: 'Playfair Display', serif;
            font-size: 0.86rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 1.4px;
        }

        .modal-secondary-link:hover {
            color: #8f2a2a;
        }

        .admin-management-section {
            position: relative;
            z-index: 4;

            max-width: 1180px;
            margin: 70px auto 0;
            padding: 38px;

            background:
                linear-gradient(145deg, rgba(20, 10, 8, 0.97), rgba(8, 4, 3, 0.99)),
                url("https://www.transparenttextures.com/patterns/leather.png");

            border: 1px solid rgba(212, 175, 55, 0.32);
            border-radius: 18px;

            box-shadow:
                0 36px 90px rgba(0, 0, 0, 0.82),
                inset 0 0 34px rgba(212, 175, 55, 0.04);

            color: #ead8a8;
        }

        .admin-section-header {
            text-align: center;
            margin-bottom: 34px;
        }

        .admin-section-kicker {
            color: #8f2a2a;
            font-family: 'Playfair Display', serif;
            font-size: 0.82rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 10px;
        }

        .admin-section-title {
            margin: 0;
            color: #d4af37;
            font-family: 'Playfair Display', serif;
            font-size: 2.3rem;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .admin-section-subtitle {
            max-width: 650px;
            margin: 14px auto 0;
            color: rgba(234, 217, 174, 0.74);
            font-style: italic;
            line-height: 1.7;
        }

        .admin-alert {
            max-width: 850px;
            margin: 0 auto 24px;
            padding: 14px 18px;

            border-radius: 10px;
            text-align: center;

            font-style: italic;
        }

        .admin-alert.success {
            color: #d4af37;
            background: rgba(212, 175, 55, 0.12);
            border: 1px solid rgba(212, 175, 55, 0.32);
        }

        .admin-alert.error {
            color: #ff9a9a;
            background: rgba(120, 20, 20, 0.18);
            border: 1px solid rgba(255, 120, 120, 0.25);
        }

        .admin-grid {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 28px;
            align-items: start;
        }

        .management-card {
            padding: 28px;

            background:
                linear-gradient(145deg, rgba(255, 250, 235, 0.06), rgba(125, 84, 28, 0.04));

            border: 1px solid rgba(212, 175, 55, 0.18);
            border-radius: 14px;

            box-shadow:
                inset 0 0 16px rgba(212, 175, 55, 0.03),
                0 18px 38px rgba(0, 0, 0, 0.35);
        }

        .management-card h3 {
            margin: 0 0 22px;

            color: #d4af37;

            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;

            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .admin-form {
            display: grid;
            gap: 16px;
        }

        .admin-form-group {
            display: grid;
            gap: 8px;
            text-align: left;
        }

        .admin-form-group label {
            color: #d6b85a;

            font-family: 'Playfair Display', serif;
            font-size: 0.78rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 1.7px;
        }

        .admin-form-group input,
        .admin-form-group textarea {
            width: 100%;
            padding: 12px 13px;

            background: rgba(10, 5, 4, 0.82);
            border: 1px solid rgba(212, 175, 55, 0.28);
            border-radius: 7px;

            color: #f5eedc;

            font-family: 'Lora', serif;
            font-size: 0.95rem;

            outline: none;
        }

        .admin-form-group textarea {
            min-height: 105px;
            resize: vertical;
            line-height: 1.6;
        }

        .admin-form-group input:focus,
        .admin-form-group textarea:focus {
            border-color: rgba(212, 175, 55, 0.78);
            box-shadow: 0 0 14px rgba(212, 175, 55, 0.1);
        }

        .admin-checkbox {
            display: flex;
            align-items: center;
            gap: 10px;

            color: rgba(234, 217, 174, 0.82);
            font-style: italic;
        }

        .admin-checkbox input {
            width: auto;
        }

        .admin-submit-btn,
        .role-toggle-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 12px 18px;

            background:
                radial-gradient(circle at 35% 30%, #9b2b2b, #5a1111 68%, #250505 100%);

            color: #f5df9d;
            text-decoration: none;

            border: 1px solid rgba(212, 175, 55, 0.55);
            border-radius: 999px;

            font-family: 'Playfair Display', serif;
            font-size: 0.78rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 1.4px;

            cursor: pointer;
        }

        .role-toggle-btn.remove {
            color: #ffdfdf;
            border-color: rgba(255, 140, 140, 0.38);
            background:
                radial-gradient(circle at 35% 30%, #7d1b1b, #3d0808 68%, #180202 100%);
        }

        .role-toggle-btn:disabled {
            opacity: 0.42;
            cursor: not-allowed;
        }

        .validation-error {
            color: #ff9a9a;
            font-size: 0.82rem;
            font-style: italic;
        }

        .users-table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .users-table {
            width: 100%;
            border-collapse: collapse;
        }

        .users-table th,
        .users-table td {
            padding: 14px 12px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.12);
            text-align: left;
            vertical-align: middle;
        }

        .users-table th {
            color: #d4af37;

            font-family: 'Playfair Display', serif;
            font-size: 0.78rem;

            text-transform: uppercase;
            letter-spacing: 1.6px;
        }

        .users-table td {
            color: rgba(245, 238, 220, 0.86);
            font-size: 0.92rem;
        }

        .role-badge {
            display: inline-flex;
            padding: 6px 11px;

            border-radius: 999px;

            font-family: 'Playfair Display', serif;
            font-size: 0.72rem;
            font-weight: bold;

            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .role-badge.admin {
            color: #d4af37;
            border: 1px solid rgba(212, 175, 55, 0.36);
            background: rgba(212, 175, 55, 0.1);
        }

        .role-badge.reader {
            color: rgba(234, 217, 174, 0.72);
            border: 1px solid rgba(234, 217, 174, 0.16);
            background: rgba(255, 255, 255, 0.03);
        }

        @media (max-width: 950px) {
            .admin-grid {
                grid-template-columns: 1fr;
            }

            .admin-management-section {
                padding: 28px 20px;
            }
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

            .admin-actions,
            .scroll-nav,
            .user-row {
                gap: 12px;
            }

            .admin-btn {
                width: 100%;
                max-width: 340px;
            }

            .announcement-card {
                padding: 22px 20px;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="royal-page">
        <div class="royal-content">

            @auth
                @if(auth()->user()->is_admin)
                    <div class="admin-actions">
                        <button type="button" class="admin-btn" data-open-modal="publish-modal">
                            Publish Chronicle
                        </button>

                        <button type="button" class="admin-btn" data-open-modal="modify-modal">
                            Modify Archives
                        </button>

                        <a href="#manage-readers" class="admin-btn">
                            Manage Readers
                        </a>
                    </div>
                @endif
            @endauth

            <div class="royal-stage">
                <div class="trumpet-wrap left">
                    <span class="royal-trumpet">📯</span>
                    <span class="royal-banner"></span>
                </div>

                <div class="scroll-wrapper">
                    <main class="vertical-scroll">
                        <div class="scroll-topline">Official Announcement</div>

                        <h1 class="scroll-title">The Silken Manuscript</h1>

                        <p class="scroll-subtitle">
                            The archives are open. Seek manuscripts, follow chronicles,
                            and preserve your favorite records in the shadowed halls of the collection.
                        </p>

                        <nav class="scroll-nav">
                            <a href="{{ route('index') }}"
                                class="scroll-link {{ request()->routeIs('index') ? 'active' : '' }}">
                                Archives
                            </a>

                            <a href="{{ route('news.index') }}"
                                class="scroll-link {{ request()->routeIs('news.index') ? 'active' : '' }}">
                                Chronicles
                            </a>

                            @auth
                                @if(auth()->user()->is_admin)
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="scroll-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                        Command Chamber
                                    </a>
                                @endif
                            @endauth
                        </nav>

                        <div class="scroll-divider"></div>

                        <div class="user-row">
                            @auth
                                <span class="reader-name">
                                    {{ auth()->user()->is_admin ? 'Curator' : 'Reader' }}
                                    {{ auth()->user()->getAttribute('username') ?: 'Reader' }}
                                </span>

                                @if(auth()->user()->is_admin)
                                    <a href="{{ route('admin.dashboard') }}" class="pill-btn">
                                        Admin Panel
                                    </a>
                                @else
                                    <a href="{{ route('profile') }}" class="pill-btn">
                                        My Archive
                                    </a>
                                @endif

                                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                                    @csrf
                                    <button type="submit" class="logout-btn">
                                        Logout
                                    </button>
                                </form>
                            @endauth

                            @guest
                                <a href="{{ route('login') }}" class="scroll-link">
                                    Login
                                </a>

                                <a href="{{ route('register') }}" class="pill-btn">
                                    Register
                                </a>
                            @endguest
                        </div>

                        <div class="announcement-list">
                            <article class="announcement-card">
                                <span class="announcement-badge">Grand Opening</span>
                                <h3>The Archives Stand Open Once More</h3>
                                <p>
                                    The great shelves now welcome every curious reader.
                                    Search forgotten manuscripts, uncover hidden tastes,
                                    and step into a collection shaped by velvet intrigue,
                                    romance, and shadowed ambition.
                                </p>
                            </article>

                            <article class="announcement-card">
                                <span class="announcement-badge">Curator’s Decree</span>
                                <h3>Chronicles May Now Be Published</h3>
                                <p>
                                    Within the Chronicle Hall, new proclamations may be drafted
                                    and released for all visitors of the Manuscript.
                                    Let every notice feel ceremonial, elegant, and worthy of the archive.
                                </p>
                            </article>

                            <article class="announcement-card">
                                <span class="announcement-badge">Whisper from the Hall</span>
                                <h3>Readers Are Invited to Preserve Their Favorites</h3>
                                <p>
                                    Every chosen manuscript may be marked and remembered.
                                    The archive now bends toward memory, allowing its visitors
                                    to keep beloved volumes close, even when the halls grow dark.
                                </p>
                            </article>
                        </div>

                        <div class="bottom-note">
                            Sealed under the authority of The Silken Manuscript.
                        </div>
                    </main>
                </div>

                <div class="trumpet-wrap right">
                    <span class="royal-trumpet">📯</span>
                    <span class="royal-banner"></span>
                </div>
            </div>

            @auth
                @if(auth()->user()->is_admin)
                    <section id="manage-readers" class="admin-management-section">
                        <header class="admin-section-header">
                            <div class="admin-section-kicker">Royal Administration</div>

                            <h2 class="admin-section-title">Manage Readers</h2>

                            <p class="admin-section-subtitle">
                                Create new reader accounts manually and grant or remove curator privileges.
                            </p>
                        </header>

                        @if(session('success'))
                            <div class="admin-alert success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="admin-alert error">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="admin-grid">
                            <article class="management-card">
                                <h3>Create User</h3>

                                <form method="POST" action="{{ route('admin.users.store') }}" class="admin-form">
                                    @csrf

                                    <div class="admin-form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" name="name" value="{{ old('name') }}" required>

                                        @error('name')
                                            <div class="validation-error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="admin-form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" name="username" value="{{ old('username') }}">

                                        @error('username')
                                            <div class="validation-error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="admin-form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" required>

                                        @error('email')
                                            <div class="validation-error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="admin-form-group">
                                        <label for="birthday">Birthday</label>
                                        <input id="birthday" type="date" name="birthday" value="{{ old('birthday') }}">

                                        @error('birthday')
                                            <div class="validation-error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="admin-form-group">
                                        <label for="bio">About</label>
                                        <textarea id="bio" name="bio">{{ old('bio') }}</textarea>

                                        @error('bio')
                                            <div class="validation-error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="admin-form-group">
                                        <label for="password">Temporary Password</label>
                                        <input id="password" type="password" name="password" required>

                                        @error('password')
                                            <div class="validation-error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label class="admin-checkbox">
                                        <input type="checkbox" name="is_admin" value="1">
                                        Create as curator / admin
                                    </label>

                                    <button type="submit" class="admin-submit-btn">
                                        Create Reader
                                    </button>
                                </form>
                            </article>

                            <article class="management-card">
                                <h3>Readers List</h3>

                                <div class="users-table-wrapper">
                                    <table class="users-table">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>
                                                        {{ $user->getAttribute('username') ?: $user->name }}
                                                    </td>

                                                    <td>
                                                        {{ $user->email }}
                                                    </td>

                                                    <td>
                                                        @if($user->is_admin)
                                                            <span class="role-badge admin">Admin</span>
                                                        @else
                                                            <span class="role-badge reader">Reader</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <form method="POST" action="{{ route('admin.users.toggle', $user) }}">
                                                            @csrf

                                                            @if($user->id === auth()->id())
                                                                <button type="button" class="role-toggle-btn" disabled>
                                                                    Current User
                                                                </button>
                                                            @else
                                                                <button type="submit"
                                                                    class="role-toggle-btn {{ $user->is_admin ? 'remove' : '' }}">
                                                                    {{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}
                                                                </button>
                                                            @endif
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </article>
                        </div>
                    </section>
                @endif
            @endauth

        </div>
    </div>

    @auth
        @if(auth()->user()->is_admin)
            <div id="publish-modal" class="royal-modal-overlay">
                <div class="royal-modal">
                    <button type="button" class="modal-close" data-close-modal>&times;</button>

                    <div class="modal-kicker">Curator’s Desk</div>

                    <h2 class="modal-title">Publish Chronicle</h2>

                    <p class="modal-text">
                        Create a new official chronicle for the visitors of the archive.
                    </p>

                    <div class="modal-actions">
                        <a href="{{ route('admin.news.create') }}" class="modal-action-link">
                            Write a New Chronicle
                        </a>

                        <a href="{{ route('news.index') }}" class="modal-secondary-link">
                            View Published Chronicles
                        </a>
                    </div>
                </div>
            </div>

            <div id="modify-modal" class="royal-modal-overlay">
                <div class="royal-modal">
                    <button type="button" class="modal-close" data-close-modal>&times;</button>

                    <div class="modal-kicker">Archive Authority</div>

                    <h2 class="modal-title">Modify Archives</h2>

                    <p class="modal-text">
                        Manage the manuscript collection and expand the library.
                    </p>

                    <div class="modal-actions">
                        <a href="{{ route('admin.books.create') }}" class="modal-action-link">
                            Add a New Manuscript
                        </a>

                        <a href="{{ route('index') }}" class="modal-secondary-link">
                            Return to Public Archives
                        </a>
                    </div>
                </div>
            </div>
        @endif
    @endauth

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const openButtons = document.querySelectorAll('[data-open-modal]');
            const closeButtons = document.querySelectorAll('[data-close-modal]');
            const modals = document.querySelectorAll('.royal-modal-overlay');

            openButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const modalId = button.getAttribute('data-open-modal');
                    const modal = document.getElementById(modalId);

                    if (modal) {
                        modal.classList.add('is-open');
                        document.body.style.overflow = 'hidden';
                    }
                });
            });

            closeButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const modal = button.closest('.royal-modal-overlay');

                    if (modal) {
                        modal.classList.remove('is-open');
                        document.body.style.overflow = '';
                    }
                });
            });

            modals.forEach(modal => {
                modal.addEventListener('click', function (event) {
                    if (event.target === modal) {
                        modal.classList.remove('is-open');
                        document.body.style.overflow = '';
                    }
                });
            });

            window.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    modals.forEach(modal => {
                        modal.classList.remove('is-open');
                    });

                    document.body.style.overflow = '';
                }
            });
        });
    </script>
</body>

</html>