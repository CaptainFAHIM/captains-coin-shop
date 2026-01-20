<section class="header-actions">
  <h1>Manage Orders</h1>
  <a class="btn btn-secondary" href="<?= BASE_URL ?>?page=admin_dashboard">Back</a>
</section>
<section class="card">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Game</th>
        <th>Amount</th>
        <th>IGN</th>
        <th>Contact</th>
        <th>Payment</th>
        <th>Txn ID</th>
        <th>Price</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orders as $o): ?>
      <tr>
        <td><?= (int)$o['id'] ?></td>
        <td><?= htmlspecialchars($o['game_name']) ?></td>
        <td><?= (int)$o['amount'] ?></td>
        <td><?= htmlspecialchars($o['ign']) ?></td>
        <td><?= htmlspecialchars($o['contact']) ?></td>
        <td><?= htmlspecialchars($o['payment_method']) ?></td>
        <td><?= htmlspecialchars($o['transaction_id']) ?></td>
        <td><?= number_format($o['price'], 2) ?></td>
        <td>
          <?php if ($o['status'] === 'pending'): ?>
            <span class="badge badge-warning">Pending</span>
          <?php else: ?>
            <span class="badge badge-success">Completed</span>
          <?php endif; ?>
        </td>
        <td>
          <?php if ($o['status'] === 'pending'): ?>
          <a class="btn btn-success btn-sm" href="<?= BASE_URL ?>?page=admin_completeOrder&id=<?= (int)$o['id'] ?>">Complete</a>
          <?php else: ?>
          <span class="muted">Done</span>
          <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>
