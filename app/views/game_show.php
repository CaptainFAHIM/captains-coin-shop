<section class="page-header">
  <h1><?= htmlspecialchars($game['name']) ?></h1>
  <p><?= nl2br(htmlspecialchars($game['description'])) ?></p>
  <div class="muted">Rate: <?= number_format($game['rate_per_unit'], 2) ?> per unit</div>
</section>
<section class="card">
  <form method="post" action="<?= BASE_URL ?>?page=order_create" class="form">
    <input type="hidden" name="game_id" value="<?= (int)$game['id'] ?>">
    <div class="form-group">
      <label>Amount (units)</label>
      <input type="number" name="amount" min="1" class="form-control" required>
    </div>
    <div class="form-group">
      <label>In-Game Name</label>
      <input type="text" name="ign" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Email or Phone</label>
      <input type="text" name="contact" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Payment Method</label>
      <select name="payment_method" class="form-select" required>
        <option value="">Select</option>
        <option>Bkash</option>
        <option>Nagad</option>
        <option>Rocket</option>
      </select>
    </div>
    <div class="form-group">
      <label>Transaction ID</label>
      <input type="text" name="transaction_id" class="form-control" required>
    </div>
    <button class="btn btn-success" type="submit">Place Order</button>
  </form>
</section>
