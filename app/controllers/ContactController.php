<?php
class ContactController extends Controller
{
    public function index()
    {
        $this->render('contact');
    }
    public function submit()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('contact');
        }
        $name = trim($_POST['name'] ?? '');
        $contact = trim($_POST['contact'] ?? '');
        $message = trim($_POST['message'] ?? '');
        if (!$name || !$contact || !$message) {
            $_SESSION['error'] = 'Invalid data';
            $this->redirect('contact');
        }
        Message::create([
            'name' => $name,
            'contact' => $contact,
            'message' => $message,
        ]);
        $_SESSION['success'] = 'Submitted';
        $this->redirect('contact');
    }
}
