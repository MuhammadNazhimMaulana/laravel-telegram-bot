<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram;

class MessageController extends Controller
{
    public function message($updates, $chat_id, $username)
    {
        if(!strtolower($updates->getMessage()->getText() === 'halo')) return Telegram::sendMessage([
            'chat_id' => $chat_id, 
            'text' => 'Halo ' . $username .', silakan coba ketik /help untuk melihat daftar perintah yang bisa anda coba'
        ]);
    }
}
