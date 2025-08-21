<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/db.php';
$sent=null;$msg='';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $name=trim($_POST['name']??'');
  $email=trim($_POST['email']??'');
  $message=trim($_POST['message']??'');
  if($name && filter_var($email,FILTER_VALIDATE_EMAIL) && $message){
    add_message($name,$email,$message);
    // Optional email - configure your server to allow mail()
    @mail($email, "Thanks for contacting us", "Hi $name, we received your message.");
    $sent=true; $msg='Message sent!';
  }else{ $sent=false; $msg='Please fill all fields correctly.'; }
}
?>
<section class="py-5">
  <div class="container container-narrow">
    <h2 class="section-title mb-3">Contact</h2>
    <?php if($sent!==null): ?>
      <div class="alert <?= $sent?'alert-success':'alert-danger' ?>"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>
    <form method="post" class="row g-3">
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
        <textarea class="textarea-dark" rows="5" name="message" required></textarea>
      </div>
      <div class="col-12">
        <button class="btn-cta" type="submit">Send</button>
      </div>
    </form>
  </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
