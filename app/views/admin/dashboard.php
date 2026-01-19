<section class="page-header header-actions">
  <h1>Dashboard</h1>
  <a class="btn btn-danger" href="<?= BASE_URL ?>?page=auth_logout">Logout</a>
</section>
<section class="grid grid-compact">
  <div class="card stat"><div class="stat-title">Games</div><div class="stat-value"><?= (int)$stats['games'] ?></div></div>
  <div class="card stat"><div class="stat-title">Orders</div><div class="stat-value><?= (int)$stats['orders'] ?></div></div>
  <div class="card stat"><div class="stat-title">Pending</div><div class="stat-value"><?= (int)$stats['pending_orders'] ?></div></div>
  <div class="card stat"><div class="stat-title">Completed</div><div class="stat-value"><?= (int)$stats['completed_orders'] ?></div></div>
  <div class="card stat"><div class="stat-title">Messages</div><div class="stat-value"><?= (int)$stats['messages'] ?></div></div>
  <div class="card stat"><div class="stat-title">Admins</div><div class="stat-value"><?= (int)$stats['admins'] ?></div></div>
</section>
<section class="menu-list">
  <a class="menu-item" href="<?= BASE_URL ?>?page=admin_games">Manage Games</a>
  <a class="menu-item" href="<?= BASE_URL ?>?page=admin_orders">Manage Orders</a>
  <a class="menu-item" href="<?= BASE_URL ?>?page=admin_admins">Manage Admins</a>
  <a class="menu-item" href="<?= BASE_URL ?>?page=admin_messages">View Messages</a>
</section>
