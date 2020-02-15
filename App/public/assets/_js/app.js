const menuIconEl = $('.menu-icon');
const sidenavEl = $('.sidenav');
const sidenavCloseEl = $('.sidenav__close-icon');

// Add and remove provided class names
function toggleClassName(el, className) {
  if (el.hasClass(className)) {
    el.removeClass(className);
  } else {
    el.addClass(className);
  }
}

// Open the side nav on click
menuIconEl.on('click', function() {
  toggleClassName(sidenavEl, 'active');
});

// Close the side nav on click
sidenavCloseEl.on('click', function() {
  toggleClassName(sidenavEl, 'active');
});

var checkbox = document.querySelector('input[name=theme]');

checkbox.addEventListener('change', function() {
    if(this.checked) {
        trans()
        toggleTheme()
        //document.documentElement.setAttribute('data-theme', 'dark')
    } else {
        trans()
        toggleTheme()
        //document.documentElement.setAttribute('data-theme', 'light')
    }
})

let trans = () => {
    document.documentElement.classList.add('transition');
    window.setTimeout(() => {
        document.documentElement.classList.remove('transition')
    }, 200)
}


// function to set a given theme/color-scheme
function setTheme(themeName) {
    localStorage.setItem('theme', themeName);
    document.documentElement.setAttribute('data-theme', themeName)
    var metaThemeColor = document.querySelector("meta[name=theme-color]");
    var color_theme = getComputedStyle(document.documentElement).getPropertyValue('--bg-main-header');
    metaThemeColor.setAttribute("content", color_theme);
}
// function to toggle between light and dark theme
function toggleTheme() {
    if (localStorage.getItem('theme') === 'dark') {
        setTheme('light');
    } else {
        setTheme('dark');
    }
}
// Immediately invoked function to set the theme on initial load
(function () {
   if (localStorage.getItem('theme') === 'dark') {
      setTheme('dark');
      checkbox.checked = true;
   } else {
      setTheme('light');
   }
})();