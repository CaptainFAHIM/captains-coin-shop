<?php
class AuthController extends Controller
{
    public function login()
    {
        if (Admin::count() === 0) {
            $hash = password_hash('admin123', PASSWORD_DEFAULT);
            Admin::create(['name' => 'Super Admin', 'email' => 'admin@example.com', 'password' => $hash]);
            $_SESSION['success'] = 'Default admin created: admin@example.com / admin123';
        }
        $this->render('admin/login');
    }
    public function doLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('auth_login');
        }
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $admin = Admin::findByEmail($email);
        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $this->redirect('admin_dashboard');
        } else {
            $_SESSION['error'] = 'Invalid credentials';
            $this->redirect('auth_login');
        }
    }
    public function logout()
    {
        unset($_SESSION['admin_id']);
        $this->redirect('home');
    }
}
