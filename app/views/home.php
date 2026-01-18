<section class="page-header">
  <h1>Available Games</h1>
  <p>Select a game to order currency.</p>
</section>
<section class="grid">
<?php foreach ($games as $g): ?>
  <article class="card game-card">
    <h2 class="card-title"><?= htmlspecialchars($g['name']) ?></h2>
    <p class="card-text"><?= nl2br(htmlspecialchars($g['description'])) ?></p>
    <div class="muted">Rate: <?= number_format($g['rate_per_unit'], 2) ?> per unit</div>
    <a class="btn btn-primary" href="<?= BASE_URL ?>?page=game&id=<?= (int)$g['id'] ?>">Order</a>
  </article>
<?php endforeach; ?>
</section>
