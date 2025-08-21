// Simple active nav link on scroll
(function(){
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.navbar .nav-link');
  function activate() {
    let index=sections.length;
    while(--index && window.scrollY + 100 < sections[index].offsetTop){}
    navLinks.forEach(l=>l.classList.remove('active'));
    if (sections[index]) {
      const id = sections[index].getAttribute('id');
      const found = [...navLinks].find(a=>a.getAttribute('href').includes('#'+id));
      if(found) found.classList.add('active');
    }
  }
  activate(); window.addEventListener('scroll', activate);
})();
