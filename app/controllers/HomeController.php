<?php
class HomeController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $this->render('home', ['games' => $games]);
    }
}
