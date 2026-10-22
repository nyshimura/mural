<?php
$animationsActive = $userPreferences['animations_active'] ?? true;
$primaryAccent = $userPreferences['accent'] ?? 'cyan';
?>
<!DOCTYPE html>
<html lang="pt-BR" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antigravity 🚀 — Desafie a Gravidade</title>
    <meta name="description" content="Plataforma e Mural Interativo Antigravity — Minimalista, futurista e sem peso.">

    <!-- Tipografia: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'Inter', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        space: {
                            950: '#04050f',
                            900: '#090b20',
                            800: '#12153a',
                        },
                        neon: {
                            cyan: '#00f0ff',
                            purple: '#a855f7',
                            indigo: '#6366f1',
                        }
                    },
                    boxShadow: {
                        'glow-cyan': '0 0 30px -2px rgba(0, 240, 255, 0.55), 0 0 60px -10px rgba(0, 240, 255, 0.3)',
                        'glow-purple': '0 0 30px -2px rgba(168, 85, 247, 0.55), 0 0 60px -10px rgba(168, 85, 247, 0.3)',
                    }
                }
            }
        };
    </script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        @keyframes gradientFlow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-16px) rotate(3deg); }
        }
        @keyframes orbitSpin {
            0% { transform: rotateX(65deg) rotateY(15deg) rotateZ(0deg); }
            100% { transform: rotateX(65deg) rotateY(15deg) rotateZ(360deg); }
        }
        @keyframes orbitReverse {
            0% { transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg); }
            100% { transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg); }
        }
        @keyframes pulseGlow {
            0%, 100% {
                box-shadow: 0 0 25px rgba(0, 240, 255, 0.55), 0 0 55px rgba(168, 85, 247, 0.35);
                transform: scale(1);
            }
            50% {
                box-shadow: 0 0 40px rgba(0, 240, 255, 0.85), 0 0 80px rgba(168, 85, 247, 0.55);
                transform: scale(1.025);
            }
        }
        .text-gradient-fluid {
            background: linear-gradient(120deg, #ffffff 0%, #00f0ff 35%, #a855f7 70%, #00f0ff 100%);
            background-size: 240% 240%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientFlow 6s ease infinite;
        }
        .cta-pulse-glow {
            animation: pulseGlow 3.2s ease-in-out infinite;
        }
        .float-orbital {
            animation: floatSlow 7s ease-in-out infinite;
        }
        .orbit-ring-1 {
            animation: orbitSpin 16s linear infinite;
        }
        .orbit-ring-2 {
            animation: orbitReverse 22s linear infinite;
        }
        .antigravity-btn {
            transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.35s ease;
        }
        .antigravity-btn:hover {
            transform: translateY(-4px);
        }
        body.animations-paused *,
        body.animations-paused *::before,
        body.animations-paused *::after {
            animation-play-state: paused !important;
        }
    </style>
</head>
<body class="bg-space-950 text-slate-100 font-sans antialiased selection:bg-neon-cyan/30 selection:text-neon-cyan overflow-x-hidden min-h-screen relative <?= !$animationsActive ? 'animations-paused' : '' ?>" data-animations="<?= $animationsActive ? 'true' : 'false' ?>" data-accent="<?= htmlspecialchars($primaryAccent) ?>">
