window.addEventListener('load', () => {
  setTimeout(() => {
    const splash = document.getElementById('splash-screen');
    if (splash) {
      splash.classList.add('fade-out');
      splash.addEventListener('transitionend', () => {
        splash.remove();
      });
    }
  }, 3000);
});