<section class="card card-narrow">
  <h1>Admin Login</h1>
  <form method="post" action="<?= BASE_URL ?>?route=auth/doLogin" class="form">
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button class="btn btn-primary" type="submit">Login</button>
  </form>
</section>
