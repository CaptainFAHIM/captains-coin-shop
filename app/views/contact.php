<section class="page-header">
  <h1>Complain or Query</h1>
</section>
<section class="card">
  <form method="post" action="<?= BASE_URL ?>?page=contact_submit" class="form">
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Email or Phone</label>
      <input type="text" name="contact" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Message</label>
      <textarea name="message" class="form-control" rows="4" required></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
  </form>
</section>
