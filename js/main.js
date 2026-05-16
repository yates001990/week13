(function () {
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initSite);
        return;
    }

    initSite();
})();

function initSite() {
    initNavigation();
    initThemeToggle();
    markCurrentPage();
}

function initThemeToggle() {
    const navShell = document.querySelector(".nav-shell");

    if (!navShell) {
        return;
    }

    const preferred = localStorage.getItem("nexusTheme") || "dark";
    document.documentElement.setAttribute("data-theme", preferred);

    const button = document.createElement("button");
    button.type = "button";
    button.className = "theme-toggle";
    button.setAttribute("aria-label", "Toggle site theme");

    const sunIcon = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>';
    const moonIcon = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>';

    const updateIcon = () => {
        const current = document.documentElement.getAttribute("data-theme") || "dark";
        button.innerHTML = current === "dark" ? sunIcon : moonIcon;
        button.setAttribute("aria-label", current === "dark" ? "Switch to light mode" : "Switch to dark mode");
    };

    updateIcon();

    button.addEventListener("click", () => {
        const current = document.documentElement.getAttribute("data-theme") || "dark";
        const next = current === "dark" ? "light" : "dark";
        document.documentElement.setAttribute("data-theme", next);
        localStorage.setItem("nexusTheme", next);
        updateIcon();
    });

    navShell.appendChild(button);
}

function initNavigation() {
    const toggle = document.querySelector(".nav-toggle");
    const nav = document.querySelector(".site-nav");

    if (!toggle || !nav) {
        return;
    }

    /* Mobile hamburger */
    toggle.addEventListener("click", () => {
        const isOpen = nav.classList.toggle("is-open");
        toggle.setAttribute("aria-expanded", String(isOpen));
    });

    /* Close mobile nav on link click */
    nav.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", () => {
            nav.classList.remove("is-open");
            toggle.setAttribute("aria-expanded", "false");
        });
    });

    /* Dropdown toggles */
    const dropdowns = document.querySelectorAll(".nav-dropdown");
    for (let i = 0; i < dropdowns.length; i += 1) {
        const dropdown = dropdowns[i];
        const btn = dropdown.querySelector(".nav-dropdown-toggle");
        if (!btn) { continue; }

        btn.addEventListener("click", (e) => {
            e.stopPropagation();
            const wasOpen = dropdown.classList.contains("is-open");

            /* Close all other dropdowns */
            for (let j = 0; j < dropdowns.length; j += 1) {
                dropdowns[j].classList.remove("is-open");
                const otherBtn = dropdowns[j].querySelector(".nav-dropdown-toggle");
                if (otherBtn) { otherBtn.setAttribute("aria-expanded", "false"); }
            }

            if (!wasOpen) {
                dropdown.classList.add("is-open");
                btn.setAttribute("aria-expanded", "true");
            }
        });
    }

    /* Close dropdown when clicking outside */
    document.addEventListener("click", () => {
        for (let i = 0; i < dropdowns.length; i += 1) {
            dropdowns[i].classList.remove("is-open");
            const btn = dropdowns[i].querySelector(".nav-dropdown-toggle");
            if (btn) { btn.setAttribute("aria-expanded", "false"); }
        }
    });
}

function markCurrentPage() {
    const currentFile = window.location.pathname.split("/").pop() || "index.php";
    const allLinks = document.querySelectorAll(".site-nav a, .nav-dropdown-menu a");
    for (let i = 0; i < allLinks.length; i += 1) {
        const link = allLinks[i];
        const href = (link.getAttribute("href") || "").split("/").pop();
        link.classList.toggle("is-active", href === currentFile || (currentFile === "" && href === "index.php"));
    }
}
