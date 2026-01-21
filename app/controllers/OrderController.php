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
        $configPath = __DIR__ . '/../../config/invoice.json';
        $invoice = [
            'title' => 'Invoice',
            'business_name' => 'Captains Coin Shop',
            'business_tagline' => '',
            'business_address' => '',
            'business_contact' => '',
            'currency_symbol' => '',
            'footer_note' => '',
        ];
        if (file_exists($configPath)) {
            $loaded = json_decode(file_get_contents($configPath), true);
            if (is_array($loaded)) {
                $invoice = array_merge($invoice, $loaded);
            }
        }
        $order = [
            'id' => $orderId,
            'game_name' => $game['name'],
            'ign' => $ign,
            'contact' => $contact,
            'payment_method' => $payment_method,
            'transaction_id' => $transaction_id,
            'amount' => $amount,
            'rate' => (float)$game['rate_per_unit'],
            'price' => $price,
            'date' => date('Y-m-d H:i'),
        ];
        $this->render('order_success', ['order' => $order, 'invoice' => $invoice]);
    }
}
