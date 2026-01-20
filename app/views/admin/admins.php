<section class="header-actions">
  <h1>Manage Admins</h1>
  <a class="btn btn-secondary" href="<?= BASE_URL ?>?page=admin_dashboard">Back</a>
</section>
<section class="grid">
  <div class="card">
    <h2>Add Admin</h2>
    <form method="post" action="<?= BASE_URL ?>?page=admin_addAdmin" class="form">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-primary" type="submit">Save</button>
    </form>
  </div>
  <div class="card">
    <h2>Admins</h2>
    <table class="table table-striped">
      <thead><tr><th>ID</th><th>Name</th><th>Email</th><th></th></tr></thead>
      <tbody>
        <?php foreach ($admins as $a): ?>
        <tr>
          <td><?= (int)$a['id'] ?></td>
          <td><?= htmlspecialchars($a['name']) ?></td>
          <td><?= htmlspecialchars($a['email']) ?></td>
          <td>
            <?php if ((int)$a['id'] !== (int)($_SESSION['admin_id'] ?? 0)): ?>
            <a class="btn btn-danger btn-sm" href="<?= BASE_URL ?>?page=admin_deleteAdmin&id=<?= (int)$a['id'] ?>">Remove</a>
            <?php else: ?>
            <span class="muted">You</span>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
