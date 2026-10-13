(() => {
    const root = document.documentElement;
    const toggle = document.querySelector('.theme-toggle');
    const icon = document.querySelector('.theme-toggle__icon');
    const menuButton = document.querySelector('.menu-toggle');
    const menu = document.querySelector('#primary-menu');
    const accountToggle = document.querySelector('#account-menu-toggle');
    const accountPanel = document.querySelector('#account-menu');

    const closeAccountMenu = () => {
        accountToggle?.setAttribute('aria-expanded', 'false');
        if (accountPanel) accountPanel.hidden = true;
    };

    accountToggle?.addEventListener('click', () => {
        const open = accountToggle.getAttribute('aria-expanded') !== 'true';
        accountToggle.setAttribute('aria-expanded', String(open));
        if (accountPanel) accountPanel.hidden = !open;
    });

    document.addEventListener('click', (event) => {
        if (!event.target.closest('.account-menu')) closeAccountMenu();
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeAccountMenu();
            accountToggle?.focus();
        }
    });

    const syncThemeButton = () => {
        const dark = root.dataset.theme === 'dark';
        if (icon) icon.textContent = dark ? '☀' : '☾';
        if (toggle) toggle.setAttribute('aria-label', dark ? 'Açık temaya geç' : 'Koyu temaya geç');
    };

    syncThemeButton();
    toggle?.addEventListener('click', () => {
        root.dataset.theme = root.dataset.theme === 'dark' ? 'light' : 'dark';
        try { localStorage.setItem('blog-theme', root.dataset.theme); } catch (e) {}
        syncThemeButton();
    });

    menuButton?.addEventListener('click', () => {
        const open = menuButton.getAttribute('aria-expanded') !== 'true';
        menuButton.setAttribute('aria-expanded', String(open));
        menuButton.setAttribute('aria-label', open ? 'Menüyü kapat' : 'Menüyü aç');
        menu?.classList.toggle('is-open', open);
    });

    menu?.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => {
        menuButton?.setAttribute('aria-expanded', 'false');
        menuButton?.setAttribute('aria-label', 'Menüyü aç');
        menu?.classList.remove('is-open');
    }));
})();
