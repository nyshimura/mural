<?php
$navLinks = [
    ['label' => 'Início', 'href' => '#hero', 'icon' => 'sparkles'],
    ['label' => 'Mural Orbital', 'href' => '#mural', 'icon' => 'layout-grid'],
    ['label' => 'Telemetria', 'href' => '#telemetria', 'icon' => 'activity'],
    ['label' => 'Estado User', 'href' => '#perfil', 'icon' => 'user-check'],
];
?>
<!-- Feature 1: Navbar Flutuante -->
<header class="fixed top-0 inset-x-0 z-50 px-4 sm:px-6 lg:px-10 pt-4">
    <nav aria-label="Navegação Principal" class="max-w-7xl mx-auto rounded-2xl bg-white/[0.04] backdrop-blur-xl border border-white/10 shadow-[0_8px_32px_0_rgba(0,0,0,0.45)] px-5 py-3.5 transition-all duration-300">
        <div class="flex items-center justify-between">
            <!-- Brand / Logo -->
            <a href="#hero" class="flex items-center gap-3 group focus:outline-none">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-neon-cyan/25 to-neon-purple/25 border border-neon-cyan/40 flex items-center justify-center shadow-glow-cyan group-hover:scale-105 transition-transform duration-300">
                    <i data-lucide="rocket" class="w-5 h-5 text-neon-cyan"></i>
                </div>
                <div class="flex flex-col">
                    <span class="font-extrabold tracking-tight text-lg text-white flex items-center gap-1.5">
                        ANTIGRAVITY
                        <span class="inline-block w-2 h-2 rounded-full bg-neon-cyan animate-ping"></span>
                    </span>
                    <span class="text-[10px] uppercase tracking-[0.22em] text-slate-400">Zero-Weight PHP OS</span>
                </div>
            </a>

            <!-- Links Centralizados no Desktop (Hover levitar -2px no eixo Y) -->
            <ul class="hidden md:flex items-center gap-2 lg:gap-4 bg-white/[0.03] border border-white/[0.07] rounded-xl px-3 py-1.5">
                <?php foreach ($navLinks as $link): ?>
                    <li>
                        <a href="<?= htmlspecialchars($link['href']) ?>"
                           class="nav-levitate inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium text-slate-300 hover:text-neon-cyan hover:bg-white/[0.05] transition-colors duration-200">
                            <i data-lucide="<?= htmlspecialchars($link['icon']) ?>" class="w-4 h-4 text-neon-cyan/80"></i>
                            <span><?= htmlspecialchars($link['label']) ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Ações Direita (Status User + Botão Nova Nota) -->
            <div class="hidden md:flex items-center gap-3">
                <a href="#perfil" class="nav-levitate flex items-center gap-2.5 px-3 py-1.5 rounded-xl bg-white/[0.04] border border-white/10 hover:border-neon-purple/50 transition-all">
                    <img src="<?= htmlspecialchars($user['avatar_url']) ?>" alt="Avatar" class="w-7 h-7 rounded-lg bg-space-800 border border-neon-cyan/30">
                    <span class="text-xs font-medium text-slate-200 max-w-[120px] truncate"><?= htmlspecialchars($user['username']) ?></span>
                </a>
                <a href="#novo-card" class="antigravity-btn inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold uppercase tracking-wider text-space-950 bg-gradient-to-r from-neon-cyan to-neon-purple shadow-glow-cyan">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    <span>Publicar</span>
                </a>
            </div>

            <!-- Botão Menu Hambúrguer no Mobile -->
            <button id="mobile-menu-btn" type="button" aria-label="Abrir Menu" aria-expanded="false"
                    class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white/5 border border-white/10 text-slate-200 hover:text-neon-cyan hover:border-neon-cyan/40 transition-colors">
                <i data-lucide="menu" id="menu-icon-open" class="w-5 h-5"></i>
                <i data-lucide="x" id="menu-icon-close" class="w-5 h-5 hidden"></i>
            </button>
        </div>

        <!-- Menu Mobile -->
        <div id="mobile-menu" class="hidden md:hidden pt-4 mt-3 border-t border-white/10 space-y-2">
            <?php foreach ($navLinks as $link): ?>
                <a href="<?= htmlspecialchars($link['href']) ?>"
                   class="mobile-nav-link flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-200 hover:text-neon-cyan hover:bg-white/5 transition-all">
                    <i data-lucide="<?= htmlspecialchars($link['icon']) ?>" class="w-4 h-4 text-neon-cyan"></i>
                    <span><?= htmlspecialchars($link['label']) ?></span>
                </a>
            <?php endforeach; ?>
            <div class="pt-2 flex items-center justify-between gap-3">
                <a href="#perfil" class="mobile-nav-link flex items-center gap-2 px-3 py-2 rounded-xl bg-white/5 border border-white/10 text-xs text-slate-300">
                    <img src="<?= htmlspecialchars($user['avatar_url']) ?>" alt="Avatar" class="w-6 h-6 rounded-md">
                    <span><?= htmlspecialchars($user['username']) ?></span>
                </a>
                <a href="#novo-card" class="mobile-nav-link inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-semibold text-space-950 bg-neon-cyan">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    <span>Publicar no Mural</span>
                </a>
            </div>
        </div>
    </nav>
</header>
