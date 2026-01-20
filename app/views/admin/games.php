<section class="header-actions">
  <h1>Manage Games</h1>
  <a class="btn btn-secondary" href="<?= BASE_URL ?>?page=admin_dashboard">Back</a>
</section>
<section class="grid">
  <div class="card">
    <h2>Add Game</h2>
    <form method="post" action="<?= BASE_URL ?>?page=admin_addGame" class="form">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label>Rate per unit</label>
        <input type="number" step="0.01" name="rate_per_unit" class="form-control" required>
      </div>
      <button class="btn btn-primary" type="submit">Save</button>
    </form>
  </div>
  <div class="card">
    <h2>Games</h2>
    <table class="table table-striped">
      <thead><tr><th>ID</th><th>Name</th><th>Rate</th><th></th></tr></thead>
      <tbody>
        <?php foreach ($games as $g): ?>
        <tr>
          <td><?= (int)$g['id'] ?></td>
          <td><?= htmlspecialchars($g['name']) ?></td>
          <td><?= number_format($g['rate_per_unit'], 2) ?></td>
          <td><a class="btn btn-danger btn-sm" href="<?= BASE_URL ?>?page=admin_deleteGame&id=<?= (int)$g['id'] ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
