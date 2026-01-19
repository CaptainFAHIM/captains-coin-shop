<?php
class Game
{
    public static function all()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT * FROM games ORDER BY id DESC');
        return $stmt->fetchAll();
    }
    public static function count()
    {
        $pdo = Database::getConnection();
        return (int)$pdo->query('SELECT COUNT(*) FROM games')->fetchColumn();
    }
    public static function find($id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM games WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public static function create($data)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('INSERT INTO games (name, description, rate_per_unit, created_at) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$data['name'], $data['description'], $data['rate_per_unit']]);
    }
    public static function delete($id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM games WHERE id = ?');
        $stmt->execute([$id]);
    }
}
