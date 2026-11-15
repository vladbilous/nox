// NOX Beauty Space — site interactions (vanilla JS, no dependencies)
(function () {
    'use strict';

    // Instagram Direct: ig.me/m/<user> opens the chat only in the phone app; on desktop it hangs.
    // Links default to the Instagram profile (has a "Message" button); on phones swap to ig.me.
    if (/Android|iPhone|iPad|iPod/i.test(navigator.userAgent)) {
        document.querySelectorAll('[data-ig-direct]').forEach((a) => {
            a.href = a.getAttribute('data-ig-direct');
        });
    }

    // Analytics events (only sent when Google tag is loaded and the visitor consented)
    function track(name, params) {
        if (window.noxTagLoaded && typeof window.gtag === 'function') window.gtag('event', name, params || {});
    }
    document.addEventListener('click', (e) => {
        const a = e.target.closest('a[href]');
        if (!a) return;
        const href = a.getAttribute('href');
        if (/booksy\.com/.test(href)) track('booking_click', { method: 'booksy' });
        else if (/instagram\.com|ig\.me/.test(href)) track('booking_click', { method: 'instagram' });
        else if (/^tel:/.test(href)) track('phone_click');
        else if (/google\.[a-z.]+\/maps\/dir/.test(href)) track('directions_click');
    });

    // Cookie consent (PKE art. 399 / RODO): nothing optional runs before the visitor decides.
    // Stored in localStorage: {v, analytics, marketing, media, date}. Older single-value choices are asked again.
    const CONSENT_KEY = 'nox_consent';
    const readConsent = () => {
        try {
            const c = JSON.parse(localStorage.getItem(CONSENT_KEY) || 'null');
            // Ask again after 12 months (as stated in the cookie policy)
            const fresh = c && c.date && (Date.now() - Date.parse(c.date)) < 365 * 24 * 3600 * 1000;
            return c && c.v === 2 && fresh ? c : null;
        } catch (err) { return null; }
    };
    const loadMaps = () => document.querySelectorAll('[data-map-consent]').forEach((box) => {
        if (box.querySelector('iframe')) return;
        const frame = document.createElement('iframe');
        frame.src = box.dataset.mapSrc;
        frame.title = box.dataset.mapTitle || 'Google Maps';
        frame.loading = 'lazy';
        frame.referrerPolicy = 'no-referrer-when-downgrade';
        box.innerHTML = '';
        box.appendChild(frame);
        box.classList.add('is-loaded');
    });
    const applyConsent = (c) => {
        if (typeof window.noxApplyTracking === 'function') window.noxApplyTracking(c);
        if (c.media) loadMaps();
    };
    const saveConsent = (c) => {
        const record = { v: 2, analytics: !!c.analytics, marketing: !!c.marketing, media: !!c.media, date: new Date().toISOString() };
        try { localStorage.setItem(CONSENT_KEY, JSON.stringify(record)); } catch (err) {}
        applyConsent(record);
        return record;
    };

    const banner = document.querySelector('[data-cookie-banner]');
    if (banner) {
        const settings = banner.querySelector('[data-cookie-settings]');
        const boxes = Array.from(banner.querySelectorAll('[data-cookie-cat]'));
        const btn = (name) => banner.querySelector(`[data-cookie-action="${name}"]`);
        const openBanner = (showSettings) => {
            const current = readConsent() || {};
            boxes.forEach((b) => { b.checked = !!current[b.dataset.cookieCat]; });
            settings.hidden = !showSettings;
            btn('settings').hidden = showSettings;
            btn('save').hidden = !showSettings;
            banner.hidden = false;
        };
        const close = () => { banner.hidden = true; };
        const all = (value) => ({ analytics: value, marketing: value, media: value });

        btn('accept').addEventListener('click', () => { saveConsent(all(true)); close(); });
        btn('reject').addEventListener('click', () => { saveConsent(all(false)); close(); });
        btn('settings').addEventListener('click', () => openBanner(true));
        btn('save').addEventListener('click', () => {
            const choice = all(false);
            boxes.forEach((b) => { choice[b.dataset.cookieCat] = b.checked; });
            saveConsent(choice);
            close();
        });
        document.querySelectorAll('[data-cookie-open]').forEach((el) => el.addEventListener('click', () => openBanner(true)));

        const stored = readConsent();
        if (stored) applyConsent(stored); else openBanner(false);
    }

    // "Show map" button: counts as consent for external media only
    document.querySelectorAll('[data-map-load]').forEach((b) => b.addEventListener('click', () => {
        const c = readConsent() || { analytics: false, marketing: false };
        saveConsent(Object.assign({}, c, { media: true }));
        if (banner) banner.hidden = true;
    }));

    // Header background on scroll
    const header = document.querySelector('[data-header]');
    const onScroll = () => header && header.classList.toggle('is-scrolled', window.scrollY > 24);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    // Mobile menu
    const burger = document.querySelector('[data-burger]');
    const menu = document.querySelector('[data-mobile-menu]');
    const setMenu = (open) => {
        if (!burger || !menu) return;
        burger.setAttribute('aria-expanded', String(open));
        document.body.classList.toggle('menu-open', open);
        menu.hidden = !open;
    };
    burger && burger.addEventListener('click', () => setMenu(burger.getAttribute('aria-expanded') !== 'true'));
    document.querySelectorAll('[data-close-menu]').forEach((a) => a.addEventListener('click', () => setMenu(false)));

    // Language dropdown
    document.querySelectorAll('[data-dropdown]').forEach((dd) => {
        const toggle = dd.querySelector('[data-dropdown-toggle]');
        toggle.addEventListener('click', (e) => {
            e.stopPropagation();
            const open = !dd.classList.contains('is-open');
            dd.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', String(open));
        });
        document.addEventListener('click', () => {
            dd.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
        });
    });

    // Price tabs
    const tabs = Array.from(document.querySelectorAll('[data-tab]'));
    const openTab = (slug) => {
        tabs.forEach((btn) => {
            const active = btn.dataset.tab === slug;
            btn.setAttribute('aria-selected', String(active));
            const panel = document.getElementById('tab-' + btn.dataset.tab);
            if (panel) panel.hidden = !active;
        });
    };
    tabs.forEach((btn, i) => {
        btn.addEventListener('click', () => openTab(btn.dataset.tab));
        btn.addEventListener('keydown', (e) => {
            if (e.key !== 'ArrowRight' && e.key !== 'ArrowLeft') return;
            const next = tabs[(i + (e.key === 'ArrowRight' ? 1 : tabs.length - 1)) % tabs.length];
            next.focus();
            openTab(next.dataset.tab);
        });
    });
    document.querySelectorAll('[data-open-tab]').forEach((card) => {
        card.addEventListener('click', () => {
            if (tabs.some((t) => t.dataset.tab === card.dataset.openTab)) openTab(card.dataset.openTab);
        });
    });

    // Reveal on scroll
    const revealEls = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -8% 0px' });
        revealEls.forEach((el) => io.observe(el));
    } else {
        revealEls.forEach((el) => el.classList.add('is-visible'));
    }

    // Gallery lightbox
    const lb = document.querySelector('[data-lightbox-root]');
    const links = Array.from(document.querySelectorAll('[data-lightbox]'));
    if (lb && links.length) {
        const img = lb.querySelector('[data-lb-img]');
        let index = 0;
        const show = (i) => {
            index = (i + links.length) % links.length;
            img.src = links[index].getAttribute('href');
            img.alt = links[index].querySelector('img').alt;
        };
        const close = () => { lb.hidden = true; document.body.classList.remove('menu-open'); };
        links.forEach((a, i) => a.addEventListener('click', (e) => {
            e.preventDefault();
            show(i);
            lb.hidden = false;
            document.body.classList.add('menu-open');
        }));
        lb.querySelector('[data-lb-close]').addEventListener('click', close);
        lb.querySelector('[data-lb-prev]').addEventListener('click', () => show(index - 1));
        lb.querySelector('[data-lb-next]').addEventListener('click', () => show(index + 1));
        lb.addEventListener('click', (e) => { if (e.target === lb) close(); });
        document.addEventListener('keydown', (e) => {
            if (lb.hidden) return;
            if (e.key === 'Escape') close();
            if (e.key === 'ArrowLeft') show(index - 1);
            if (e.key === 'ArrowRight') show(index + 1);
        });
    }

    // Contact form (AJAX)
    const form = document.querySelector('[data-contact-form]');
    if (form) {
        const status = form.querySelector('[data-form-status]');
        const button = form.querySelector('button[type="submit"]');
        const i18n = window.NOX_I18N || {};
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            status.className = 'form-status';
            if (!form.checkValidity()) {
                status.textContent = i18n.required;
                status.classList.add('is-error');
                return;
            }
            const label = button.textContent;
            button.disabled = true;
            button.textContent = button.dataset.labelSending;
            fetch('/send_form.php', { method: 'POST', body: new FormData(form) })
                .then((r) => r.json())
                .then((data) => {
                    status.textContent = data.message;
                    status.classList.add(data.success ? 'is-success' : 'is-error');
                    if (data.success) {
                        form.reset();
                        track('generate_lead', { method: 'contact_form' });
                    }
                })
                .catch(() => {
                    status.textContent = i18n.error;
                    status.classList.add('is-error');
                })
                .finally(() => {
                    button.disabled = false;
                    button.textContent = label;
                });
        });
    }
})();
