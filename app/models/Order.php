<?php
class Order
{
    public static function all()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT o.*, g.name AS game_name FROM orders o JOIN games g ON o.game_id = g.id ORDER BY o.id DESC');
        return $stmt->fetchAll();
    }
    public static function count()
    {
        $pdo = Database::getConnection();
        return (int)$pdo->query('SELECT COUNT(*) FROM orders')->fetchColumn();
    }
    public static function countByStatus($status)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM orders WHERE status = ?');
        $stmt->execute([$status]);
        return (int)$stmt->fetchColumn();
    }
    public static function create($data)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('INSERT INTO orders (game_id, amount, ign, contact, payment_method, transaction_id, price, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, "pending", NOW())');
        $stmt->execute([
            $data['game_id'],
            $data['amount'],
            $data['ign'],
            $data['contact'],
            $data['payment_method'],
            $data['transaction_id'],
            $data['price'],
        ]);
        return (int)$pdo->lastInsertId();
    }
    public static function markCompleted($id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('UPDATE orders SET status = "completed", completed_at = NOW() WHERE id = ?');
        $stmt->execute([$id]);
    }
}
