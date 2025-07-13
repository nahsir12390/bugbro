<script>
    const html = document.documentElement;
    const themeIcon = document.getElementById('themeIcon');

    // Initialize theme from localStorage
    const storedTheme = localStorage.getItem('theme') || 'light';
    html.setAttribute('data-bs-theme', storedTheme);
    updateIcon(storedTheme);

   themeIcon.addEventListener('click', () => {
        const newTheme = html.getAttribute('data-bs-theme') === 'light' ? 'dark' : 'light';
        html.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateIcon(newTheme);
    });

    function updateIcon(theme) {
        if (theme === 'dark') {
            themeIcon.classList.remove('bi-moon-fill');
            themeIcon.classList.add('bi-brightness-high','text-white');
        } else {
            themeIcon.classList.remove('bi-brightness-high', 'text-white');
            themeIcon.classList.add('bi-moon-fill');
        }
    }
</script>