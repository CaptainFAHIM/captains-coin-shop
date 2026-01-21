<section class="card">
  <h1><?= htmlspecialchars($invoice['title'] ?? 'Invoice') ?></h1>
  <div class="muted"><?= htmlspecialchars($invoice['business_name'] ?? '') ?></div>
  <?php if (!empty($invoice['business_tagline'])): ?><div class="muted"><?= htmlspecialchars($invoice['business_tagline']) ?></div><?php endif; ?>
  <?php if (!empty($invoice['business_address'])): ?><div class="muted"><?= htmlspecialchars($invoice['business_address']) ?></div><?php endif; ?>
  <?php if (!empty($invoice['business_contact'])): ?><div class="muted"><?= htmlspecialchars($invoice['business_contact']) ?></div><?php endif; ?>
  <table class="table table-striped" style="margin-top:12px">
    <tbody>
      <tr><th>Invoice ID</th><td>#<?= (int)$order['id'] ?></td></tr>
      <tr><th>Date</th><td><?= htmlspecialchars($order['date']) ?></td></tr>
      <tr><th>Game</th><td><?= htmlspecialchars($order['game_name']) ?></td></tr>
      <tr><th>In-Game Name</th><td><?= htmlspecialchars($order['ign']) ?></td></tr>
      <tr><th>Contact</th><td><?= htmlspecialchars($order['contact']) ?></td></tr>
      <tr><th>Payment Method</th><td><?= htmlspecialchars($order['payment_method']) ?></td></tr>
      <tr><th>Transaction ID</th><td><?= htmlspecialchars($order['transaction_id']) ?></td></tr>
      <tr><th>Amount (units)</th><td><?= (int)$order['amount'] ?></td></tr>
      <tr><th>Rate per unit</th><td><?= htmlspecialchars(($invoice['currency_symbol'] ?? '').number_format($order['rate'], 2)) ?></td></tr>
      <tr><th>Total Price</th><td><strong><?= htmlspecialchars(($invoice['currency_symbol'] ?? '').number_format($order['price'], 2)) ?></strong></td></tr>
    </tbody>
  </table>
  <?php if (!empty($invoice['footer_note'])): ?><div class="muted" style="margin-top:8px"><?= htmlspecialchars($invoice['footer_note']) ?></div><?php endif; ?>
  <div style="margin-top:12px">
    <a class="btn btn-primary" href="<?= BASE_URL ?>?page=home">Back to Home</a>
  </div>
</section>
