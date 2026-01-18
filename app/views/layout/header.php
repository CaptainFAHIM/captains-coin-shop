<?php
$flashError = $_SESSION['error'] ?? null;
$flashSuccess = $_SESSION['success'] ?? null;
unset($_SESSION['error'], $_SESSION['success']);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Captains Coin Shop</title>
<link href="<?= BASE_URL ?>?page=asset_css" rel="stylesheet">
</head>
<body>
<header class="navbar">
  <div class="container navbar-inner">
    <a class="brand" href="<?= BASE_URL ?>?page=home">Captains Coin Shop</a>
    <nav class="nav-links">
      <a href="<?= BASE_URL ?>?page=home">Home</a>
      <a href="<?= BASE_URL ?>?page=contact">Contact</a>
      <a href="<?= BASE_URL ?>?page=admin_dashboard">Admin</a>
    </nav>
  </div>
</header>
<main class="container content">
<?php if ($flashError): ?>
<div class="alert alert-danger"><?= htmlspecialchars($flashError) ?></div>
<?php endif; ?>
<?php if ($flashSuccess): ?>
<div class="alert alert-success"><?= htmlspecialchars($flashSuccess) ?></div>
<?php endif; ?>
