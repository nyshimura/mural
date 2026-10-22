<?php
declare(strict_types=1);

session_start();

$storageDir = __DIR__ . '/../storage';
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0755, true);
}
$muralFile = $storageDir . '/mural_posts.json';

// Entidade Principal: User (conforme seção 4 do requisitos.md)
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [
        'id' => 'f47ac10b-58cc-4372-a567-0e02b2c3d479',
        'username' => 'Comandante Nova',
        'avatar_url' => 'https://api.dicebear.com/9.x/bottts-neutral/svg?seed=AntigravityNova',
        'preferences' => json_encode([
            'theme' => 'deep-space',
            'animations_active' => true,
            'accent' => 'cyan'
        ])
    ];
}

// Processamento de ações via POST (Preferências do User e Novo Card no Mural)
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && isset($_POST['action'])) {
    $prefs = json_decode($_SESSION['user']['preferences'], true);

    if ($_POST['action'] === 'toggle_animations') {
        $prefs['animations_active'] = !$prefs['animations_active'];
        $_SESSION['user']['preferences'] = json_encode($prefs);
        header('Location: index.php#perfil');
        exit;
    }

    if ($_POST['action'] === 'update_user') {
        $name = trim(strip_tags($_POST['username'] ?? ''));
        $accent = in_array($_POST['accent'] ?? '', ['cyan', 'purple'], true) ? $_POST['accent'] : 'cyan';
        if ($name !== '') {
            $_SESSION['user']['username'] = $name;
            $_SESSION['user']['avatar_url'] = 'https://api.dicebear.com/9.x/bottts-neutral/svg?seed=' . urlencode($name);
        }
        $prefs['accent'] = $accent;
        $_SESSION['user']['preferences'] = json_encode($prefs);
        header('Location: index.php#perfil');
        exit;
    }

    if ($_POST['action'] === 'add_mural_card') {
        $title = trim(strip_tags($_POST['title'] ?? ''));
        $category = trim(strip_tags($_POST['category'] ?? 'Telemetria'));
        $description = trim(strip_tags($_POST['description'] ?? ''));
        $metric = trim(strip_tags($_POST['metric'] ?? '0.00 G'));

        if ($title !== '' && $description !== '') {
            $posts = file_exists($muralFile) ? json_decode((string) file_get_contents($muralFile), true) : [];
            $posts = is_array($posts) ? $posts : [];
            array_unshift($posts, [
                'id' => bin2hex(random_bytes(8)),
                'title' => $title,
                'category' => $category ?: 'Orbital',
                'description' => $description,
                'metric' => $metric ?: '0.00 G',
                'icon' => 'sparkles',
                'accent' => ($_POST['card_accent'] ?? 'cyan') === 'purple' ? 'purple' : 'cyan',
                'author' => $_SESSION['user']['username'],
                'created_at' => date('d/m/Y H:i')
            ]);
            file_put_contents($muralFile, json_encode(array_slice($posts, 0, 18), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
        header('Location: index.php#mural');
        exit;
    }
}

$user = $_SESSION['user'];
$userPreferences = json_decode($user['preferences'], true);

$defaultCards = [
    ['id' => 'c1', 'title' => 'Propulsão Quântica Zero-G', 'category' => 'Core Engine', 'description' => 'Estabilização magnética que elimina 99,8% do atrito visual e entrega micro-interações fluidas em qualquer tela.', 'metric' => '0.002 G', 'icon' => 'atom', 'accent' => 'cyan', 'author' => 'Sistema Orbital'],
    ['id' => 'c2', 'title' => 'Malha Neural Translúcida', 'category' => 'Glassmorphism UI', 'description' => 'Camadas de vidro fosco com refração dinâmica em espaço profundo, mantendo contraste impecável e leveza extrema.', 'metric' => '120 FPS', 'icon' => 'layers', 'accent' => 'purple', 'author' => 'Arquitetura UX'],
    ['id' => 'c3', 'title' => 'Sincronia Orbital de Dados', 'category' => 'State Schema', 'description' => 'Fluxo de estado leve para entidades de usuário, preferências em JSON e telemetria em tempo real sem sobrecarga.', 'metric' => '< 4ms', 'icon' => 'orbit', 'accent' => 'cyan', 'author' => 'Núcleo PHP'],
    ['id' => 'c4', 'title' => 'Campo de Distorção Harmônica', 'category' => 'Sensores 3D', 'description' => 'Rastreamento vetorial do cursor com inclinação tridimensional responsiva e iluminação periférica em neon.', 'metric' => '±8° Tilt', 'icon' => 'compass', 'accent' => 'purple', 'author' => 'Lab Sensorial'],
    ['id' => 'c5', 'title' => 'Cápsula de Identidade UUID', 'category' => 'Segurança', 'description' => 'Persistência de perfil com preferências modulares de animação e assinatura única por sessão PHP.', 'metric' => 'UUID v4', 'icon' => 'shield-check', 'accent' => 'cyan', 'author' => 'Guard Orbital'],
    ['id' => 'c6', 'title' => 'Mural de Ideias Sem Peso', 'category' => 'Colaboração', 'description' => 'Publique módulos e descobertas diretamente no mural espacial com feedback visual instantâneo.', 'metric' => '∞ Nodes', 'icon' => 'sparkles', 'accent' => 'purple', 'author' => 'Comunidade']
];

$savedPosts = file_exists($muralFile) ? json_decode((string) file_get_contents($muralFile), true) : [];
$muralCards = is_array($savedPosts) && count($savedPosts) > 0 ? array_merge($savedPosts, $defaultCards) : $defaultCards;
