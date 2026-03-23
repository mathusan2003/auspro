import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
    Alpine.data('supportVoiceNav', () => ({
        menuOpen: false,
        qaDropdownOpen: false,
        qaMobileOpen: false,
        navVisible: true,
        atTop: true,
        lastY: 0,
        reduceMotion: false,

        init() {
            this.reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            this.lastY = window.scrollY;
            this.syncScrollState(window.scrollY);
            requestAnimationFrame(() => this.onScroll());
        },

        toggleMenu() {
            if (window.matchMedia('(min-width: 1024px)').matches) {
                return;
            }
            this.menuOpen = !this.menuOpen;
            document.body.classList.toggle('overflow-hidden', this.menuOpen);
            if (this.menuOpen) {
                this.navVisible = true;
            }
        },

        closeMenu() {
            this.menuOpen = false;
            this.qaMobileOpen = false;
            document.body.classList.remove('overflow-hidden');
        },

        toggleQaDropdown() {
            this.qaDropdownOpen = !this.qaDropdownOpen;
        },

        closeQaDropdown() {
            this.qaDropdownOpen = false;
        },

        syncScrollState(y) {
            const topThreshold = 12;
            this.atTop = y <= topThreshold;
            if (this.atTop) {
                this.navVisible = true;
            }
        },

        onScroll() {
            const y = window.scrollY;

            if (this.reduceMotion) {
                this.syncScrollState(y);
                this.navVisible = true;
                this.lastY = y;
                return;
            }

            const topThreshold = 12;
            if (y <= topThreshold) {
                this.atTop = true;
                this.navVisible = true;
                this.lastY = y;
                return;
            }

            this.atTop = false;

            if (this.menuOpen) {
                this.navVisible = true;
                this.lastY = y;
                return;
            }

            const delta = y - this.lastY;
            const minDelta = 4;
            if (Math.abs(delta) < minDelta) {
                this.lastY = y;
                return;
            }

            this.navVisible = delta < 0;
            if (!this.navVisible) {
                this.closeQaDropdown();
            }
            this.lastY = y;
        },
    }));
});

Alpine.start();

function initHeroParallax() {
    const root = document.querySelector('[data-hero-banner]');
    if (!root) {
        return;
    }

    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    if (reduceMotion.matches) {
        return;
    }

    const layers = root.querySelectorAll('[data-parallax-layer]');
    if (!layers.length) {
        return;
    }

    const maxShift = () => (window.innerWidth < 768 ? 12 : 24);

    let ticking = false;

    const update = () => {
        const rect = root.getBoundingClientRect();
        const vh = window.innerHeight || 1;
        const bannerMid = rect.top + rect.height / 2;
        const viewMid = vh / 2;
        const normalized = (viewMid - bannerMid) / vh;
        const clamped = Math.max(-1, Math.min(1, normalized));
        const px = clamped * maxShift();

        layers.forEach((el) => {
            const factor = Number.parseFloat(el.dataset.parallaxLayer ?? '0', 10);
            const y = px * factor;
            el.style.transform = `translate3d(0, ${y}px, 0)`;
        });

        ticking = false;
    };

    const onScrollOrResize = () => {
        if (!ticking) {
            requestAnimationFrame(update);
            ticking = true;
        }
    };

    window.addEventListener('scroll', onScrollOrResize, { passive: true });
    window.addEventListener('resize', onScrollOrResize, { passive: true });
    update();
}

/**
 * Our Services: one circular magnifier interaction for mouse + touch.
 */
function initServicesMagnifier() {
    const root = document.querySelector('[data-services-magnifier]');
    const source = document.getElementById('services-source');
    const lens = document.getElementById('services-lens');
    const inner = document.getElementById('services-lens-inner');
    if (!root || !source || !lens || !inner) {
        return;
    }

    const mqReduce = window.matchMedia('(prefers-reduced-motion: reduce)');
    const ZOOM = 1.14;
    const LENS_R = 110;
    const ease = 0.16;

    let tx = 0;
    let ty = 0;
    let lx = 0;
    let ly = 0;
    let raf = null;
    let active = false;
    let lastClientX = 0;
    let lastClientY = 0;

    const canTrack = () => !mqReduce.matches;

    function stripIds(el) {
        el.removeAttribute('id');
        el.querySelectorAll('[id]').forEach((node) => {
            node.removeAttribute('id');
        });
    }

    function buildClone() {
        inner.replaceChildren();
        const clone = source.cloneNode(true);
        stripIds(clone);
        clone.setAttribute('aria-hidden', 'true');
        inner.appendChild(clone);
        inner.style.width = `${source.offsetWidth}px`;
        inner.style.height = `${source.offsetHeight}px`;
        inner.style.transform = `scale(${ZOOM})`;
        inner.style.transformOrigin = '0 0';
    }

    function applyLens() {
        lens.style.transform = `translate3d(${lx}px, ${ly}px, 0) translate(-50%, -50%)`;

        const rRect = root.getBoundingClientRect();
        const sRect = source.getBoundingClientRect();
        const sx = sRect.left - rRect.left;
        const sy = sRect.top - rRect.top;
        const mrx = lx - sx;
        const mry = ly - sy;

        inner.style.left = `${LENS_R - mrx * ZOOM}px`;
        inner.style.top = `${LENS_R - mry * ZOOM}px`;
    }

    function tick() {
        lx += (tx - lx) * ease;
        ly += (ty - ly) * ease;
        applyLens();
        const moving = Math.abs(tx - lx) > 0.35 || Math.abs(ty - ly) > 0.35;
        if (active || moving) {
            raf = requestAnimationFrame(tick);
        } else {
            raf = null;
        }
    }

    function showLens() {
        lens.classList.remove('opacity-0');
        lens.classList.add('opacity-100');
    }

    function hideLens() {
        lens.classList.remove('opacity-100');
        lens.classList.add('opacity-0');
    }

    function updateTarget(clientX, clientY) {
        lastClientX = clientX;
        lastClientY = clientY;
        const rect = root.getBoundingClientRect();
        tx = clientX - rect.left;
        ty = clientY - rect.top;
    }

    function startTracking(clientX, clientY) {
        if (!canTrack()) {
            return;
        }
        updateTarget(clientX, clientY);
        active = true;
        showLens();
        if (!raf) {
            raf = requestAnimationFrame(tick);
        }
    }

    function stopTracking() {
        active = false;
        hideLens();
        if (raf) {
            cancelAnimationFrame(raf);
            raf = null;
        }
    }

    function onMouseMove(e) {
        startTracking(e.clientX, e.clientY);
    }

    function onTouchStart(e) {
        const touch = e.touches[0];
        if (!touch) {
            return;
        }
        startTracking(touch.clientX, touch.clientY);
    }

    function onTouchMove(e) {
        const touch = e.touches[0];
        if (!touch) {
            return;
        }
        startTracking(touch.clientX, touch.clientY);
    }

    function onScroll() {
        if (!canTrack() || !active) {
            return;
        }
        updateTarget(lastClientX, lastClientY);
        if (!raf) {
            raf = requestAnimationFrame(tick);
        }
    }

    function onResize() {
        if (!canTrack()) {
            return;
        }
        buildClone();
        if (active) {
            updateTarget(lastClientX, lastClientY);
        } else {
            const rect = root.getBoundingClientRect();
            tx = rect.width / 2;
            ty = rect.height / 2;
            lx = tx;
            ly = ty;
        }
        applyLens();
        if (active && !raf) {
            raf = requestAnimationFrame(tick);
        }
    }

    function bind() {
        if (!canTrack()) {
            return;
        }
        buildClone();
        const rect = root.getBoundingClientRect();
        tx = rect.width / 2;
        ty = rect.height / 2;
        lx = tx;
        ly = ty;
        applyLens();
        hideLens();

        root.addEventListener('mousemove', onMouseMove, { passive: true });
        root.addEventListener('mouseleave', stopTracking);
        root.addEventListener('touchstart', onTouchStart, { passive: true });
        root.addEventListener('touchmove', onTouchMove, { passive: true });
        root.addEventListener('touchend', stopTracking, { passive: true });
        root.addEventListener('touchcancel', stopTracking, { passive: true });
    }

    function unbind() {
        root.removeEventListener('mousemove', onMouseMove);
        root.removeEventListener('mouseleave', stopTracking);
        root.removeEventListener('touchstart', onTouchStart);
        root.removeEventListener('touchmove', onTouchMove);
        root.removeEventListener('touchend', stopTracking);
        root.removeEventListener('touchcancel', stopTracking);
        stopTracking();
    }

    function refresh() {
        unbind();
        bind();
    }

    bind();
    mqReduce.addEventListener('change', refresh);
    window.addEventListener('scroll', onScroll, { passive: true, capture: true });
    window.addEventListener('resize', onResize, { passive: true });
}

document.addEventListener('DOMContentLoaded', () => {
    initHeroParallax();
    initServicesMagnifier();
});
