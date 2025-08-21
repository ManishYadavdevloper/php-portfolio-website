<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/db.php';
$projects = get_projects(9);
?>
<section id="home" class="hero">
  <div class="container container-narrow py-5">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <p class="hello text-muted mb-1">Hello <span style="color:var(--accent)">•</span></p>
        <p class="subtitle mb-1">I'm <strong>MAnish Yadav</strong></p>
        <h1 class="title mb-3">Software Developer</h1>
        <div class="d-flex gap-2 flex-wrap">
          <button class="btn-cta" id="contactModalBtn" type="button">Got a project?</button>
<!-- Contact Modal Popup -->
<div id="contactModal" class="modal-custom" style="display:none;">
  <div class="modal-content-custom">
    <span class="close-modal" id="closeContactModal">&times;</span>
    <h3>Contact Me</h3>
    <form id="popupContactForm" class="row g-3" method="post" action="contact.php">
      <div class="col-md-6">
        <label class="form-label">Name</label>
        <input class="input-dark" type="text" name="name" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Email</label>
        <input class="input-dark" type="email" name="email" required>
      </div>
      <div class="col-12">
        <label class="form-label">Message</label>
        <textarea class="textarea-dark" rows="4" name="message" required></textarea>
      </div>
      <div class="col-12 d-flex flex-column align-items-start gap-2">
        <button class="btn-cta" type="submit">Send</button>
        <div class="text-muted small">or reach me on WhatsApp: <a href="https://wa.me/919999999999" target="_blank" style="color:var(--accent);text-decoration:underline;">+91 99999 99999</a></div>
      </div>
    </form>
  </div>
</div>
          <a class="btn-ghost" href="assets/resume.pdf">My resume</a>
        </div>
        <div class="mt-4">
          <span class="badge-skill">HTML5</span>
          <span class="badge-skill">CSS</span>
          <span class="badge-skill">JavaScript</span>
          <span class="badge-skill">PHP</span>
          <span class="badge-skill">Bootstrap</span>
          <span class="badge-skill">Tailwind</span>
          <span class="badge-skill">C</span>
          <span class="badge-skill">C++</span>
          <span class="badge-skill">Git</span>
          <span class="badge-skill">Github</span>
        </div>
      </div>
      <div class="col-lg-5 text-center">
        <img class="img-fluid rounded-4 border border-1 border-dark home-profile-animate" src="assets/images/secm.png" alt="Profile">
      </div>
    </div>
  </div>

</section>

<?php include __DIR__ . '/includes/coffee_section.html'; ?>

<section id="about" class="py-5">
  <div class="container container-narrow">
    <div class="row g-4 align-items-center">
      <div class="col-md-12">
        <h2 class="section-title mb-3">About me</h2>
        <p class="text-muted">
          I started my software journey from photography. Through that, I learned to love
          the process of creating from scratch. Since then, this has led me to software
          development as it fulfills my love for learning and building things.
        </p>
        <button id="aboutMoreBtn" class="btn-cta mt-3" type="button">More about me</button>
        <!-- About Modal -->
        <div id="aboutModal" class="modal-custom about-modal-wide" style="display:none;">
          <div class="modal-content-custom about-modal-content-animate d-flex flex-column flex-md-row align-items-center justify-content-center p-0">
            <div class="about-modal-details p-4 flex-fill">
              <span class="close-modal" id="closeAboutModal">&times;</span>
              <h3>About Me - Details</h3>
              <p class="text-muted">I am a passionate software developer with a background in photography, which taught me creativity and attention to detail. My journey into tech started with curiosity and a drive to build things from scratch. I enjoy working with modern web technologies, learning new frameworks, and collaborating on innovative projects. My goal is to create meaningful digital experiences and continuously grow as a developer.</p>
              <ul class="text-muted">
                <li>Strong foundation in PHP, JavaScript, and modern web development</li>
                <li>Experience with REST APIs, MySQL, and responsive UI design</li>
                <li>Open to freelance and collaborative opportunities</li>
              </ul>
            </div>
            <div class="about-modal-img  d-md-flex align-items-center justify-content-center p-4" style="min-width:260px;">
              <img src="assets/images/secm.png" alt="About Me" style="max-width:220px; border-radius:18px; box-shadow:0 8px 32px #ff6b5740;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="projects" class="py-5">
  <div class="container container-narrow">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="section-title m-0">Projects</h2>
      <a href="projects.php" class="btn btn-sm btn-outline-light rounded-3">View all</a>
    </div>
  <div class="projects-row">
      <?php foreach($projects as $p): ?>
        <div class="col-lg-3">
          <article class="card-proj h-100">
            <img src="assets/images/<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>">
            <div class="p-3">
              <h5 class="mb-1"><?= htmlspecialchars($p['title']) ?></h5>
              <p class="text-muted small mb-2"><?= htmlspecialchars($p['summary']) ?></p>
              <div class="d-flex gap-2 flex-wrap small text-muted mb-3">
                <?php foreach(explode(',', $p['tech_stack']) as $tech): ?>
                  <span class="badge-skill"><?= htmlspecialchars(trim($tech)) ?></span>
                <?php endforeach; ?>
              </div>
              <div class="d-flex gap-2">
                <?php if(!empty($p['project_url'])): ?><a class="btn btn-sm btn-outline-light rounded-3" href="<?= htmlspecialchars($p['project_url']) ?>" target="_blank" rel="noopener">Live</a><?php endif; ?>
                <?php if(!empty($p['github_url'])): ?><a class="btn btn-sm btn-outline-light rounded-3" href="<?= htmlspecialchars($p['github_url']) ?>" target="_blank" rel="noopener">Code</a><?php endif; ?>
              </div>
            </div>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<script>
// About Modal logic
const aboutBtn = document.getElementById('aboutMoreBtn');
const aboutModal = document.getElementById('aboutModal');
const closeAboutModal = document.getElementById('closeAboutModal');
if(aboutBtn && aboutModal && closeAboutModal) {
  aboutBtn.onclick = () => aboutModal.style.display = 'block';
  closeAboutModal.onclick = () => aboutModal.style.display = 'none';
  window.addEventListener('click', (e) => { if(e.target === aboutModal) aboutModal.style.display = 'none'; });
}
// Contact Modal logic
const contactBtn = document.getElementById('contactModalBtn');
const contactModal = document.getElementById('contactModal');
const closeContactModal = document.getElementById('closeContactModal');
if(contactBtn && contactModal && closeContactModal) {
  contactBtn.onclick = () => contactModal.style.display = 'flex';
  closeContactModal.onclick = () => contactModal.style.display = 'none';
  window.addEventListener('click', (e) => { if(e.target === contactModal) contactModal.style.display = 'none'; });
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
