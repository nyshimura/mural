<!-- Feature 2: Hero Section (Tela Inicial) -->
<section id="hero" class="relative min-h-screen flex items-center pt-32 pb-20 px-4 sm:px-6 lg:px-10 overflow-hidden">
    <!-- Luzes Nebulosas de Fundo (Deep Space) -->
    <div class="pointer-events-none absolute -top-28 left-1/4 w-[28rem] h-[28rem] rounded-full bg-neon-purple/20 blur-[130px]"></div>
    <div class="pointer-events-none absolute top-1/3 -right-20 w-[26rem] h-[26rem] rounded-full bg-neon-cyan/15 blur-[130px]"></div>

    <div class="max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center relative z-10">
        <!-- Coluna de Texto e CTA -->
        <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
            <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-white/[0.05] border border-neon-cyan/30 backdrop-blur-md shadow-sm">
                <span class="w-2 h-2 rounded-full bg-neon-cyan animate-pulse"></span>
                <span class="text-xs font-semibold uppercase tracking-[0.2em] text-neon-cyan">
                    Arquitetura Sem Peso • PHP Nativo
                </span>
            </div>

            <h1 class="text-5xl sm:text-6xl xl:text-7xl font-extrabold tracking-tight leading-[1.08]">
                <span class="text-gradient-fluid block">Desafie a Gravidade</span>
                <span class="text-white/90 text-3xl sm:text-4xl xl:text-5xl font-bold mt-3 block">
                    Interfaces que flutuam no espaço profundo.
                </span>
            </h1>

            <p class="font-body text-base sm:text-lg lg:text-xl text-slate-300/90 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                Cada interação foi projetada para eliminar o peso visual. Experimente vidro fosco translúcido, inclinação 3D magnética e telemetria viva em um ecossistema onde suas ideias orbitam livremente.
            </p>

            <!-- Botões de Ação (CTA principal com pulso suave e glow externo) -->
            <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                <a href="#mural"
                   class="cta-pulse-glow antigravity-btn inline-flex items-center justify-center gap-3 px-8 py-4 rounded-2xl font-bold text-base text-space-950 bg-gradient-to-r from-neon-cyan via-cyan-300 to-neon-purple transition-all duration-300">
                    <i data-lucide="sparkles" class="w-5 h-5"></i>
                    <span>Explorar Mural Orbital</span>
                    <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                </a>

                <a href="#novo-card"
                   class="antigravity-btn inline-flex items-center justify-center gap-2.5 px-7 py-4 rounded-2xl font-semibold text-sm text-white bg-white/[0.05] hover:bg-white/[0.1] border border-white/15 hover:border-neon-purple/60 backdrop-blur-xl transition-all">
                    <i data-lucide="radio" class="w-4 h-4 text-neon-purple"></i>
                    <span>Lançar Cápsula no Mural</span>
                </a>
            </div>

            <!-- Indicadores Rápidos de Telemetria -->
            <div id="telemetria" class="grid grid-cols-3 gap-4 pt-6 max-w-lg mx-auto lg:mx-0">
                <div class="rounded-2xl bg-white/[0.03] border border-white/10 backdrop-blur-md p-3.5 text-left">
                    <p class="text-[11px] uppercase tracking-wider text-slate-400">Gravidade Local</p>
                    <p class="text-lg sm:text-xl font-bold text-neon-cyan mt-0.5">0.00 G</p>
                </div>
                <div class="rounded-2xl bg-white/[0.03] border border-white/10 backdrop-blur-md p-3.5 text-left">
                    <p class="text-[11px] uppercase tracking-wider text-slate-400">Módulos Ativos</p>
                    <p class="text-lg sm:text-xl font-bold text-white mt-0.5"><?= count($muralCards) ?> Nodes</p>
                </div>
                <div class="rounded-2xl bg-white/[0.03] border border-white/10 backdrop-blur-md p-3.5 text-left">
                    <p class="text-[11px] uppercase tracking-wider text-slate-400">Física Orbital</p>
                    <p class="text-lg sm:text-xl font-bold text-neon-purple mt-0.5"><?= $animationsActive ? 'Online' : 'Estática' ?></p>
                </div>
            </div>
        </div>

        <!-- Coluna Direita: Elemento Visual Abstrato 3D / Forma Geométrica Flutuante -->
        <div class="lg:col-span-5 flex items-center justify-center relative">
            <div class="float-orbital relative w-80 h-80 sm:w-96 sm:h-96 flex items-center justify-center" id="hero-3d-orb">
                <!-- Halo Externo -->
                <div class="absolute inset-4 rounded-full bg-gradient-to-tr from-neon-cyan/20 via-neon-purple/20 to-transparent blur-2xl"></div>

                <!-- Anéis Orbitais 3D -->
                <div class="orbit-ring-1 absolute w-72 h-72 sm:w-80 sm:h-80 rounded-full border-2 border-neon-cyan/40 shadow-[0_0_25px_rgba(0,240,255,0.3)]"></div>
                <div class="orbit-ring-2 absolute w-64 h-64 sm:w-72 sm:h-72 rounded-full border border-dashed border-neon-purple/60"></div>

                <!-- Octaedro / Prisma de Vidro Central -->
                <div class="relative w-44 h-44 sm:w-52 sm:h-52 rounded-3xl rotate-12 bg-gradient-to-br from-white/15 via-white/5 to-neon-purple/20 backdrop-blur-2xl border border-white/25 shadow-glow-cyan flex flex-col items-center justify-center p-6 text-center group hover:rotate-0 transition-transform duration-700">
                    <div class="w-14 h-14 rounded-2xl bg-neon-cyan/20 border border-neon-cyan/50 flex items-center justify-center mb-3 shadow-glow-cyan">
                        <i data-lucide="orbit" class="w-8 h-8 text-neon-cyan"></i>
                    </div>
                    <span class="text-xs font-bold uppercase tracking-[0.22em] text-neon-cyan">Core Zero-G</span>
                    <span class="text-[11px] text-slate-300 mt-1">Rastreamento Vetorial 3D</span>
                </div>

                <!-- Satélites Flutuantes -->
                <div class="absolute -top-2 right-6 px-3.5 py-2 rounded-xl bg-white/10 backdrop-blur-xl border border-neon-cyan/40 text-xs font-medium text-neon-cyan shadow-lg flex items-center gap-1.5">
                    <i data-lucide="zap" class="w-3.5 h-3.5"></i>
                    <span>-2px Levitate</span>
                </div>
                <div class="absolute bottom-4 -left-2 px-3.5 py-2 rounded-xl bg-white/10 backdrop-blur-xl border border-neon-purple/40 text-xs font-medium text-purple-300 shadow-lg flex items-center gap-1.5">
                    <i data-lucide="box" class="w-3.5 h-3.5"></i>
                    <span>3D Tilt Ativo</span>
                </div>
            </div>
        </div>
    </div>
</section>
