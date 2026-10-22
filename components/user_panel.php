<!-- Seção 4 do requisitos.md: Estrutura de Dados / Estado (State Schema: User) -->
<section id="perfil" class="relative py-20 px-4 sm:px-6 lg:px-10">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
            <!-- Visualizador de Estado da Entidade User (JSON Schema em Tempo Real) -->
            <div class="lg:col-span-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-xl p-6 sm:p-8 flex flex-col justify-between space-y-6">
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <img src="<?= htmlspecialchars($user['avatar_url']) ?>" alt="Avatar do Usuário"
                             class="w-16 h-16 rounded-2xl bg-space-900 border-2 border-neon-cyan/50 shadow-glow-cyan">
                        <div>
                            <span class="text-[11px] uppercase tracking-[0.2em] text-neon-cyan font-semibold">Entidade Principal • User</span>
                            <h3 class="text-2xl font-bold text-white"><?= htmlspecialchars($user['username']) ?></h3>
                            <p class="text-xs font-mono text-slate-400 mt-0.5">UUID: <?= htmlspecialchars($user['id']) ?></p>
                        </div>
                    </div>
                </div>

                <!-- Código JSON do Estado Atual -->
                <div class="rounded-xl bg-space-950/90 border border-white/10 p-4 font-mono text-xs text-slate-300 overflow-x-auto">
                    <div class="flex items-center justify-between pb-2 mb-2 border-b border-white/10 text-[11px] text-slate-400">
                        <span>SESSION['user'] (PHP State Schema)</span>
                        <span class="text-neon-cyan">JSON Ativo</span>
                    </div>
<pre class="leading-relaxed text-cyan-200/90"><?= htmlspecialchars(json_encode([
    'id' => $user['id'],
    'username' => $user['username'],
    'avatar_url' => $user['avatar_url'],
    'preferences' => json_decode($user['preferences'], true)
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) ?></pre>
                </div>

                <!-- Alternador Rápido de Animações -->
                <form method="POST" action="index.php#perfil" class="flex items-center justify-between pt-2">
                    <input type="hidden" name="action" value="toggle_animations">
                    <span class="text-xs text-slate-300">
                        Status de Animações Globais:
                        <strong class="<?= $animationsActive ? 'text-neon-cyan' : 'text-amber-400' ?>">
                            <?= $animationsActive ? 'ATIVAS (Zero-G)' : 'PAUSADAS' ?>
                        </strong>
                    </span>
                    <button type="submit" class="antigravity-btn px-4 py-2 rounded-xl text-xs font-semibold border border-white/15 bg-white/5 hover:border-neon-cyan hover:text-neon-cyan transition-all">
                        <?= $animationsActive ? 'Pausar Flutuação' : 'Ativar Flutuação' ?>
                    </button>
                </form>
            </div>

            <!-- Painel de Customização da Entidade User -->
            <div class="lg:col-span-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-xl p-6 sm:p-8 flex flex-col justify-between space-y-6">
                <div class="space-y-2">
                    <span class="text-xs font-semibold uppercase tracking-[0.2em] text-neon-purple">Configuração de Sessão</span>
                    <h3 class="text-2xl font-bold text-white">Sincronizar Identidade Orbital</h3>
                    <p class="font-body text-sm text-slate-300/85">
                        Atualize seu `username`, gere um novo `avatar_url` dinâmico e personalize o JSON de `preferences` diretamente na sessão PHP.
                    </p>
                </div>

                <form method="POST" action="index.php#perfil" class="space-y-4">
                    <input type="hidden" name="action" value="update_user">

                    <div>
                        <label class="block text-xs font-medium text-slate-300 mb-1.5">Username (`user.username`)</label>
                        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required maxlength="40"
                               class="w-full rounded-xl bg-space-900/80 border border-white/15 px-4 py-3 text-sm text-white focus:outline-none focus:border-neon-cyan">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-300 mb-1.5">Cor Neon Primária (`preferences.accent`)</label>
                        <select name="accent" class="w-full rounded-xl bg-space-900/80 border border-white/15 px-4 py-3 text-sm text-white focus:outline-none focus:border-neon-cyan">
                            <option value="cyan" <?= ($userPreferences['accent'] ?? 'cyan') === 'cyan' ? 'selected' : '' ?>>Cyan Orbital (#00f0ff)</option>
                            <option value="purple" <?= ($userPreferences['accent'] ?? 'cyan') === 'purple' ? 'selected' : '' ?>>Electric Purple (#a855f7)</option>
                        </select>
                    </div>

                    <button type="submit" class="antigravity-btn w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl font-bold text-xs uppercase tracking-wider text-space-950 bg-gradient-to-r from-neon-cyan to-neon-purple shadow-glow-cyan">
                        <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                        <span>Salvar Estado User</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
