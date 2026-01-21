<section class="header-actions">
  <h1>Messages</h1>
  <a class="btn btn-secondary" href="<?= BASE_URL ?>?page=admin_dashboard">Back</a>
</section>
<section class="card">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Message</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($messages as $m): ?>
      <tr>
        <td><?= (int)$m['id'] ?></td>
        <td><?= htmlspecialchars($m['name']) ?></td>
        <td><?= htmlspecialchars($m['contact']) ?></td>
        <td><?= nl2br(htmlspecialchars($m['message'])) ?></td>
        <td><?= htmlspecialchars($m['created_at']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>
