<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/db.php';
$projects = get_projects(100);
?>
<section class="py-5">
  <div class="container container-narrow">
    <h2 class="section-title mb-4">All Projects</h2>
    <div class="row g-4">
      <?php foreach($projects as $p): ?>
        <div class="col-md-6">
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
<?php require_once __DIR__ . '/includes/footer.php'; ?>
