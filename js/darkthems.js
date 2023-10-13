const themeButton = document.getElementById('theme-button');
const body = document.body;
const icon = themeButton;

// Function to toggle dark mode
function toggleDarkMode() {
    body.classList.toggle('dark-theme');
    if (body.classList.contains('dark-theme')) {
        icon.classList.remove('uil-sun');
        icon.classList.add('uil-moon');
        localStorage.setItem('theme', 'dark');
    } else {
        icon.classList.remove('uil-moon');
        icon.classList.add('uil-sun');
        localStorage.setItem('theme', 'light');
    }
}

// Check for stored theme preference
const storedTheme = localStorage.getItem('theme');
if (storedTheme === 'dark') {
    body.classList.add('dark-theme');
    icon.classList.remove('uil-sun');
    icon.classList.add('uil-moon');
}

// Add click event listener
themeButton.addEventListener('click', toggleDarkMode);
