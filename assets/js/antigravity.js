/**
 * Antigravity Micro-interactions & 3D Tilt Engine
 * Simula física elástica (estilo Framer Motion) para Navbar, Hero e Cards 3D.
 */
document.addEventListener('DOMContentLoaded', () => {
    if (window.lucide) {
        window.lucide.createIcons();
    }

    const animationsEnabled = document.body.dataset.animations !== 'false';

    // 1. Menu Hambúrguer Mobile
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('menu-icon-open');
    const iconClose = document.getElementById('menu-icon-close');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            const isHidden = mobileMenu.classList.toggle('hidden');
            menuBtn.setAttribute('aria-expanded', String(!isHidden));
            iconOpen?.classList.toggle('hidden', !isHidden);
            iconClose?.classList.toggle('hidden', isHidden);
        });

        document.querySelectorAll('.mobile-nav-link').forEach((link) => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                iconOpen?.classList.remove('hidden');
                iconClose?.classList.add('hidden');
            });
        });
    }

    // 2. Feature 1: Links da Navbar com levitação suave de -2px no eixo Y (Framer Motion spring feel)
    document.querySelectorAll('.nav-levitate').forEach((link) => {
        link.style.transition = 'transform 0.28s cubic-bezier(0.34, 1.56, 0.64, 1), color 0.2s ease, background-color 0.2s ease';
        link.addEventListener('mouseenter', () => {
            if (!animationsEnabled) return;
            link.style.transform = 'translateY(-2px)';
        });
        link.addEventListener('mouseleave', () => {
            link.style.transform = 'translateY(0px)';
        });
    });

    // 3. Feature 3: Cards com Inclinação 3D (Tilt) em direção ao cursor e borda acendendo na cor primária
    document.querySelectorAll('.tilt-card').forEach((card) => {
        const spotlight = card.querySelector('.card-spotlight');
        const accentColor = card.getAttribute('data-accent-color') || '#00f0ff';

        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            // Inclina em direção ao cursor
            const rotateX = animationsEnabled ? ((y - centerY) / centerY) * -8 : 0;
            const rotateY = animationsEnabled ? ((x - centerX) / centerX) * 8 : 0;

            card.style.transform = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) translateY(-4px)`;
            card.style.borderColor = accentColor;
            card.style.boxShadow = `0 18px 40px -15px rgba(0,0,0,0.7), 0 0 25px -5px ${accentColor}55`;

            if (spotlight) {
                spotlight.style.background = `radial-gradient(380px circle at ${x}px ${y}px, ${accentColor}22, transparent 70%)`;
            }
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0px)';
            card.style.borderColor = 'rgba(255, 255, 255, 0.1)';
            card.style.boxShadow = 'none';
        });
    });
});
