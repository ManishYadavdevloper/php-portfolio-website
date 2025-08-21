  </main>
  <footer class="py-5 text-center text-muted bg-footer">
    <div class="container small">
      <div class="row g-3">
        <div class="col-md-4">
          <div class="stat"><span class="num">100+</span><span>Completed Projects</span></div>
        </div>
        <div class="col-md-4">
          <div class="stat"><span class="num">98%</span><span>Client Satisfaction</span></div>
        </div>
        <div class="col-md-4">
          <div class="stat"><span class="num">4+</span><span>Years of Experience</span></div>
        </div>
      </div>
      <hr class="my-4 opacity-25">
      <p class="mb-0">© <span id="y"></span> <?= SITE_NAME ?> </p>
    </div>
  </footer>
  <script>document.getElementById('y').textContent = new Date().getFullYear();</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>
</html>
