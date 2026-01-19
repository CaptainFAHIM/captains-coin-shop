<?php
class Message
{
    public static function all()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT * FROM messages ORDER BY id DESC');
        return $stmt->fetchAll();
    }
    public static function count()
    {
        $pdo = Database::getConnection();
        return (int)$pdo->query('SELECT COUNT(*) FROM messages')->fetchColumn();
    }
    public static function create($data)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('INSERT INTO messages (name, contact, message, created_at) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$data['name'], $data['contact'], $data['message']]);
    }
}
