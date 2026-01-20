<?php
class GameController extends Controller
{
    public function show()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $game = Game::find($id);
        if (!$game) {
            http_response_code(404);
            echo 'Game not found';
            return;
        }
        $this->render('game_show', ['game' => $game]);
    }
}
