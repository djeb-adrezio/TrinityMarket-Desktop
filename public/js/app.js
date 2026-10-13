/* Sidebar : repli persistant (desktop) et tiroir (mobile). */
(function () {
    var root = document.documentElement;
    var KEY = 'tm.sidebar.collapsed';

    var toggle = document.querySelector('[data-sidebar-toggle]');
    var opener = document.querySelector('[data-nav-open]');
    var closers = document.querySelectorAll('[data-nav-close]');
    var scrim = document.querySelector('.sidebar-scrim');

    function setCollapsed(collapsed) {
        root.classList.toggle('sidebar-collapsed', collapsed);
        if (toggle) {
            toggle.setAttribute('aria-expanded', String(!collapsed));
            toggle.setAttribute('title', collapsed ? 'Déplier le menu' : 'Replier le menu');
            toggle.querySelector('.nav-item__label').textContent =
                collapsed ? 'Déplier le menu' : 'Replier le menu';
        }
        try { localStorage.setItem(KEY, collapsed ? '1' : '0'); } catch (e) {}
    }

    function setOpen(open) {
        root.classList.toggle('nav-open', open);
        if (opener) opener.setAttribute('aria-expanded', String(open));
        if (scrim) scrim.hidden = !open;
    }

    setCollapsed(root.classList.contains('sidebar-collapsed'));

    if (toggle) {
        toggle.addEventListener('click', function () {
            setCollapsed(!root.classList.contains('sidebar-collapsed'));
        });
    }

    if (opener) {
        opener.addEventListener('click', function () {
            setOpen(!root.classList.contains('nav-open'));
        });
    }

    Array.prototype.forEach.call(closers, function (el) {
        el.addEventListener('click', function () { setOpen(false); });
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') setOpen(false);
    });

    window.matchMedia('(min-width: 901px)').addEventListener('change', function () {
        setOpen(false);
    });
})();
