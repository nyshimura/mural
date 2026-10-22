<?php
/**
 * Projeto: Antigravity 🚀
 * Ponto de entrada principal em PHP modular (todos os arquivos < 150 linhas).
 */
require_once __DIR__ . '/config/data.php';
require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/components/navbar.php';
?>

<main class="relative z-10">
    <?php require_once __DIR__ . '/components/hero.php'; ?>
    <?php require_once __DIR__ . '/components/mural_section.php'; ?>
    <?php require_once __DIR__ . '/components/user_panel.php'; ?>
</main>

<?php require_once __DIR__ . '/components/footer.php'; ?>
