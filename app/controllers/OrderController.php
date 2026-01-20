<?php
class OrderController extends Controller
{
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('home');
        }
        $game_id = (int)($_POST['game_id'] ?? 0);
        $amount = (int)($_POST['amount'] ?? 0);
        $ign = trim($_POST['ign'] ?? '');
        $contact = trim($_POST['contact'] ?? '');
        $payment_method = trim($_POST['payment_method'] ?? '');
        $transaction_id = trim($_POST['transaction_id'] ?? '');
        $game = Game::find($game_id);
        if (!$game || $amount <= 0 || !$ign || !$contact || !$payment_method || !$transaction_id) {
            $_SESSION['error'] = 'Invalid order data';
            $this->redirect('home');
        }
        $price = $game['rate_per_unit'] * $amount;
        $orderId = Order::create([
            'game_id' => $game_id,
            'amount' => $amount,
            'ign' => $ign,
            'contact' => $contact,
            'payment_method' => $payment_method,
            'transaction_id' => $transaction_id,
            'price' => $price,
        ]);
        $this->render('order_success', ['order_id' => $orderId]);
    }
}
