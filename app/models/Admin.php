<?php
class Admin
{
    public static function all()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT id, name, email, created_at FROM admins ORDER BY id DESC');
        return $stmt->fetchAll();
    }
    public static function count()
    {
        $pdo = Database::getConnection();
        return (int)$pdo->query('SELECT COUNT(*) FROM admins')->fetchColumn();
    }
    public static function findByEmail($email)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM admins WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    public static function create($data)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('INSERT INTO admins (name, email, password, created_at) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$data['name'], $data['email'], $data['password']]);
    }
    public static function delete($id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM admins WHERE id = ?');
        $stmt->execute([$id]);
    }
}
