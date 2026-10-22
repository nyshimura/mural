<?php
require_once __DIR__ . '/card.php';
?>
<!-- Seção do Mural de Cards 3D Reutilizáveis -->
<section id="mural" class="relative py-24 px-4 sm:px-6 lg:px-10">
    <div class="max-w-7xl mx-auto space-y-14">
        <!-- Cabeçalho da Seção -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div class="space-y-3 max-w-2xl">
                <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.22em] text-neon-cyan">
                    <i data-lucide="layers" class="w-4 h-4"></i>
                    Mural Interativo • Tilt 3D
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                    Módulos em Órbita Estacionária
                </h2>
                <p class="font-body text-slate-300/85 text-base">
                    Passe o cursor sobre qualquer card para sentir a inclinação 3D magnética e o acendimento periférico em neon.
                </p>
            </div>

            <a href="#novo-card" class="antigravity-btn self-start md:self-auto inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white/5 hover:bg-white/10 border border-neon-cyan/40 text-neon-cyan text-xs font-semibold uppercase tracking-wider">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>Adicionar ao Mural</span>
            </a>
        </div>

        <!-- Grid Responsivo Mobile-First de Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8" style="perspective: 1200px;">
            <?php foreach ($muralCards as $card): ?>
                <?php renderAntigravityCard($card); ?>
            <?php endforeach; ?>
        </div>

        <!-- Formulário PHP para Publicar Novo Card no Mural -->
        <div id="novo-card" class="pt-8">
            <div class="rounded-2xl bg-white/[0.04] border border-white/10 backdrop-blur-2xl p-6 sm:p-10 shadow-2xl relative overflow-hidden">
                <div class="pointer-events-none absolute -right-16 -bottom-16 w-64 h-64 rounded-full bg-neon-cyan/10 blur-3xl"></div>

                <div class="max-w-3xl space-y-6 relative z-10">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-neon-cyan/15 border border-neon-cyan/40 flex items-center justify-center text-neon-cyan">
                            <i data-lucide="send" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Publicar Nova Cápsula no Mural</h3>
                            <p class="text-xs text-slate-400">Persistência imediata em PHP nativo sem recarregar dependências externas.</p>
                        </div>
                    </div>

                    <form method="POST" action="index.php#mural" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="hidden" name="action" value="add_mural_card">

                        <div>
                            <label class="block text-xs font-medium text-slate-300 mb-1.5">Título do Card *</label>
                            <input type="text" name="title" required maxlength="60" placeholder="Ex: Propulsor Fotônico V2"
                                   class="w-full rounded-xl bg-space-900/80 border border-white/15 px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-neon-cyan">
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-medium text-slate-300 mb-1.5">Categoria</label>
                                <input type="text" name="category" maxlength="25" placeholder="Ex: Telemetria"
                                       class="w-full rounded-xl bg-space-900/80 border border-white/15 px-3.5 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-neon-cyan">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-300 mb-1.5">Métrica</label>
                                <input type="text" name="metric" maxlength="16" placeholder="Ex: 0.00 G"
                                       class="w-full rounded-xl bg-space-900/80 border border-white/15 px-3.5 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-neon-cyan">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-medium text-slate-300 mb-1.5">Descrição *</label>
                            <textarea name="description" required rows="2" maxlength="220" placeholder="Descreva a descoberta ou módulo que ficará flutuando no mural..."
                                      class="w-full rounded-xl bg-space-900/80 border border-white/15 px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-neon-cyan"></textarea>
                        </div>

                        <div class="sm:col-span-2 flex flex-wrap items-center justify-between gap-4 pt-2">
                            <div class="flex items-center gap-4 text-xs text-slate-300">
                                <span class="text-slate-400">Cor de Brilho:</span>
                                <label class="inline-flex items-center gap-1.5 cursor-pointer">
                                    <input type="radio" name="card_accent" value="cyan" checked class="accent-cyan-400">
                                    <span class="text-neon-cyan font-medium">Neon Cyan</span>
                                </label>
                                <label class="inline-flex items-center gap-1.5 cursor-pointer">
                                    <input type="radio" name="card_accent" value="purple" class="accent-purple-500">
                                    <span class="text-purple-300 font-medium">Electric Purple</span>
                                </label>
                            </div>

                            <button type="submit" class="antigravity-btn inline-flex items-center gap-2 px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-wider text-space-950 bg-gradient-to-r from-neon-cyan to-neon-purple shadow-glow-cyan">
                                <i data-lucide="sparkles" class="w-4 h-4"></i>
                                <span>Lançar no Mural</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
