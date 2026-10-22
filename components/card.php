<?php
/**
 * Feature 3: Card de Apresentação de Dados Reutilizável
 * Fundo escuro com opacidade (bg-white/5), borda sutil (border-white/10),
 * arredondamento grande (rounded-2xl), efeito tilt 3D em direção ao cursor
 * e borda que acende com a cor primária.
 */
function renderAntigravityCard(array $card): void
{
    $isPurple = ($card['accent'] ?? 'cyan') === 'purple';
    $accentColor = $isPurple ? '#a855f7' : '#00f0ff';
    $badgeClasses = $isPurple
        ? 'bg-neon-purple/15 text-purple-300 border-neon-purple/30'
        : 'bg-neon-cyan/15 text-neon-cyan border-neon-cyan/30';
    $iconWrapClasses = $isPurple
        ? 'bg-neon-purple/15 border-neon-purple/40 text-purple-300'
        : 'bg-neon-cyan/15 border-neon-cyan/40 text-neon-cyan';
    ?>
    <article
        class="tilt-card group relative rounded-2xl bg-white/5 border border-white/10 backdrop-blur-xl p-6 sm:p-7 transition-all duration-300 select-none overflow-hidden"
        data-accent-color="<?= htmlspecialchars($accentColor) ?>"
        style="transform-style: preserve-3d; will-change: transform;">

        <!-- Brilho radial dinâmico guiado pelo cursor -->
        <div class="card-spotlight pointer-events-none absolute -inset-px rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

        <div class="relative z-10 flex flex-col h-full justify-between space-y-5" style="transform: translateZ(18px);">
            <!-- Cabeçalho do Card -->
            <div class="flex items-start justify-between gap-4">
                <div class="w-12 h-12 rounded-xl border <?= $iconWrapClasses ?> flex items-center justify-center shadow-inner transition-transform duration-300 group-hover:scale-110">
                    <i data-lucide="<?= htmlspecialchars($card['icon'] ?? 'sparkles') ?>" class="w-6 h-6"></i>
                </div>

                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold border <?= $badgeClasses ?>">
                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                    <?= htmlspecialchars($card['category'] ?? 'Orbital') ?>
                </span>
            </div>

            <!-- Conteúdo Principal -->
            <div class="space-y-2.5">
                <h3 class="text-xl font-bold text-white group-hover:text-neon-cyan transition-colors duration-200">
                    <?= htmlspecialchars($card['title']) ?>
                </h3>
                <p class="font-body text-sm text-slate-300/85 leading-relaxed">
                    <?= htmlspecialchars($card['description']) ?>
                </p>
            </div>

            <!-- Rodapé de Telemetria do Card -->
            <div class="pt-4 border-t border-white/10 flex items-center justify-between text-xs text-slate-400">
                <div class="flex items-center gap-2">
                    <i data-lucide="user" class="w-3.5 h-3.5 text-slate-400"></i>
                    <span><?= htmlspecialchars($card['author'] ?? 'Antigravity') ?></span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="font-mono font-semibold text-white px-2.5 py-1 rounded-lg bg-white/5 border border-white/10">
                        <?= htmlspecialchars($card['metric'] ?? '0.00 G') ?>
                    </span>
                </div>
            </div>
        </div>
    </article>
    <?php
}
