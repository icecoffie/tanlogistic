import { animate, inView, scroll, stagger } from 'motion';

/**
 * Page animations powered by Motion (motion.dev, the vanilla JS version of Framer Motion).
 *
 * Markup API (used in Blade views):
 *   data-reveal="up|fade|left|right|scale"  animate in when scrolled into view
 *   data-delay="0.2"                         extra delay in seconds
 *   data-stagger                             animate the direct children one after another
 *   data-count                               count a number up from 0 (keeps prefix/suffix, e.g. "10,000+")
 *   data-parallax="120"                      move the element on scroll (px over the section height)
 *   data-float                               gentle floating loop after it has revealed
 */

const EASE = [0.22, 1, 0.36, 1];

const FROM = {
    up: { opacity: [0, 1], y: [32, 0] },
    fade: { opacity: [0, 1] },
    left: { opacity: [0, 1], x: [-40, 0] },
    right: { opacity: [0, 1], x: [40, 0] },
    scale: { opacity: [0, 1], scale: [0.92, 1] },
};

const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

function float(el) {
    animate(el, { y: [0, -8, 0] }, { duration: 6, repeat: Infinity, ease: 'easeInOut' });
}

function reveal(el) {
    const keyframes = FROM[el.dataset.reveal] ?? FROM.up;
    const delay = parseFloat(el.dataset.delay ?? 0);

    inView(el, () => {
        const controls = animate(el, keyframes, { duration: 0.9, delay, ease: EASE });
        if (el.hasAttribute('data-float')) controls.then(() => float(el));
    }, { amount: 0.2 });
}

function staggerChildren(container) {
    const children = [...container.children];
    const delay = parseFloat(container.dataset.delay ?? 0);
    const step = parseFloat(container.dataset.stagger || 0.08);

    inView(container, () => {
        animate(children, FROM[container.dataset.revealChildren] ?? FROM.up, {
            duration: 0.8,
            delay: stagger(step, { startDelay: delay }),
            ease: EASE,
        });
    }, { amount: 0.15 });
}

function countUp(el) {
    const original = el.textContent.trim();
    const match = original.match(/^(\D*)([\d.,]+)(.*)$/);
    if (!match) return;

    const [, prefix, number, suffix] = match;
    const target = parseFloat(number.replace(/,/g, ''));
    const grouped = number.includes(',');
    const format = (v) => prefix + (grouped ? Math.round(v).toLocaleString('en-US') : Math.round(v)) + suffix;

    el.style.fontVariantNumeric = 'tabular-nums';
    el.textContent = format(0);

    inView(el, () => {
        animate(0, target, {
            duration: target > 100 ? 2.2 : 1.6,
            ease: EASE,
            onUpdate: (v) => (el.textContent = format(v)),
            onComplete: () => (el.textContent = original),
        });
    }, { amount: 0.6 });
}

function parallax(el) {
    const distance = parseFloat(el.dataset.parallax || 100);
    const target = el.closest('section') ?? el.parentElement;
    scroll(animate(el, { y: [0, distance] }, { ease: 'linear' }), { target, offset: ['start start', 'end start'] });
}

export function initMotion() {
    window.__motionReady = true;

    if (reducedMotion) {
        document.documentElement.classList.remove('js-motion');
        return;
    }

    document.querySelectorAll('[data-reveal]').forEach(reveal);
    document.querySelectorAll('[data-stagger]').forEach(staggerChildren);
    document.querySelectorAll('[data-count]').forEach(countUp);
    document.querySelectorAll('[data-parallax]').forEach(parallax);
    document.querySelectorAll('[data-float]:not([data-reveal])').forEach(float);

    // Hero background: slow zoom out on page load
    document.querySelectorAll('[data-zoom-in]').forEach((el) =>
        animate(el, { scale: [1.12, 1] }, { duration: 1.8, ease: EASE }),
    );
}

/** Small helper for Alpine components (route planner). */
export { animate };
