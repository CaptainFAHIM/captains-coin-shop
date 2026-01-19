<?php
class AdminController extends Controller
{
    private function requireLogin()
    {
        if (!isset($_SESSION['admin_id'])) {
            $this->redirect('auth_login');
        }
    }
    public function dashboard()
    {
        $this->requireLogin();
        $stats = [
            'games' => Game::count(),
            'orders' => Order::count(),
            'pending_orders' => Order::countByStatus('pending'),
            'completed_orders' => Order::countByStatus('completed'),
            'messages' => Message::count(),
            'admins' => Admin::count(),
        ];
        $this->render('admin/dashboard', ['stats' => $stats]);
    }
    public function games()
    {
        $this->requireLogin();
        $games = Game::all();
        $this->render('admin/games', ['games' => $games]);
    }
    public function addGame()
    {
        $this->requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('admin_games');
        }
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $rate = (float)($_POST['rate_per_unit'] ?? 0);
        if (!$name || $rate <= 0) {
            $_SESSION['error'] = 'Invalid game data';
            $this->redirect('admin_games');
        }
        Game::create([
            'name' => $name,
            'description' => $description,
            'rate_per_unit' => $rate,
        ]);
        $this->redirect('admin_games');
    }
    public function deleteGame()
    {
        $this->requireLogin();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id) {
            Game::delete($id);
        }
        $this->redirect('admin_games');
    }
    public function orders()
    {
        $this->requireLogin();
        $orders = Order::all();
        $this->render('admin/orders', ['orders' => $orders]);
    }
    public function completeOrder()
    {
        $this->requireLogin();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id) {
            Order::markCompleted($id);
        }
        $this->redirect('admin_orders');
    }
    public function admins()
    {
        $this->requireLogin();
        $admins = Admin::all();
        $this->render('admin/admins', ['admins' => $admins]);
    }
    public function addAdmin()
    {
        $this->requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('admin_admins');
        }
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        if (!$name || !$email || !$password) {
            $_SESSION['error'] = 'Invalid admin data';
            $this->redirect('admin_admins');
        }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        Admin::create([
            'name' => $name,
            'email' => $email,
            'password' => $hash,
        ]);
        $this->redirect('admin_admins');
    }
    public function deleteAdmin()
    {
        $this->requireLogin();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id && $id !== (int)$_SESSION['admin_id']) {
            Admin::delete($id);
        }
        $this->redirect('admin_admins');
    }
    public function messages()
    {
        $this->requireLogin();
        $messages = Message::all();
        $this->render('admin/messages', ['messages' => $messages]);
    }
}
