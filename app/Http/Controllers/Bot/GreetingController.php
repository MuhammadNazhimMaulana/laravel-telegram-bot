<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use Telegram;
class GreetingController extends Controller
{
    public function greet($updates, $chat_id, $username)
    {
        if(strtolower($updates->getMessage()->getText() === 'halo')) return Telegram::sendMessage([
            'chat_id' => $chat_id, 
            'text' => 'Halo ' . $username .', apa kabar?'
        ]);

        if(strtolower($updates->getMessage()->getText() === 'baik')) return Telegram::sendMessage([
            'chat_id' => $chat_id, 
            'text' => 'Ada apa tuh? Coba ceritakan'
        ]);
    }
}
