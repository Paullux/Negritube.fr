if (localStorage.getItem('theme') === null) {
  setTheme('theme-dark');
}

// function to set a given theme/color-scheme
function setTheme(themeName) {
  localStorage.setItem('theme', themeName);
  document.documentElement.className = themeName;
}

// function to toggle between light and dark theme
function toggleTheme() {
  if (localStorage.getItem('theme') === 'theme-dark') {
    setTheme('theme-light');
    document.getElementById('stylesheet').setAttribute('href', '../assets/css/light.css');
  } else {
    setTheme('theme-dark');
    document.getElementById('stylesheet').setAttribute('href', '../assets/css/dark.css');
  }
}

// Immediately invoked function to set the theme on initial load
window.addEventListener("load", function() {
  if (localStorage.getItem('theme') === 'theme-dark') {
    setTheme('theme-dark');
    document.getElementById('slider').checked = false;
    document.getElementById('stylesheet').setAttribute('href', '../assets/css/dark.css');
  } else {
    setTheme('theme-light');
    document.getElementById('slider').checked = true;
    document.getElementById('stylesheet').setAttribute('href', '../assets/css/light.css');
  }
});
