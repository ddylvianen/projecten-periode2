<nav class="nav">
  <div class="nav-mobile">
    <a href="/">
      <h1 class="logo">FitForFun</h1>
    </a>
    <div id="hamburger-menu">
      <i class="fa-solid fa-bars"></i>
    </div>
  </div>
  <div class="nav-links-cont open">
    
    <div class="nav-links open">
      <a href="/">home</a>
      <a href="/lessen">lessen</a>
      <a href="/reservering">reserveringen</a>
      <a href="/overzicht">lessenoverzicht</a>
      <a href="/overzicht">medewerkerlessen</a>
    </div>

    <div class="nav-links nav-account open">
      <a href="">Sign up</a>
      <a href="">Login</a>
    </div>
  </div>
</nav>

<script>
  const hamburgerMenu = document.getElementById('hamburger-menu');
  const navLinksCont = document.querySelector('.nav-links-cont');
  const navLinks = document.querySelectorAll('.nav-links');

  console.log(navLinks);

  hamburgerMenu.addEventListener('click', () => {
    navLinksCont.classList.toggle('open');
    navLinks.forEach(i=> {i.classList.toggle('open');});
    // navLinks.classList.toggle('open');
  });
</script>