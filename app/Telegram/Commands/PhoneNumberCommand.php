<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Commands\Command;
use Telegram;

class PhoneNumberCommand extends Command
{
    /**
    * @var string Nama Perintah
    */
    protected $name = 'ceknomor';
    
    /**
    * @var array Alias Perintah
    */
    protected $aliases = ['cek_nomor'];
    
    /**
    * @var string Deskripsi Perintah
    */
    protected $description = 'Perintah untuk mendapatkan nomor telepon.';
    /**
    * {@inheritdoc}
    */
    
    public function handle()
    {
       $response = $this->getUpdate();
       $chat_id = $response->getChat()->getId();
       $btn = Keyboard::button([
           'text' => 'Share Phone Number',
           'request_contact' => true,
       ]);
       $keyboard = Keyboard::make([
           'keyboard' => [[$btn]],
           'resize_keyboard' => true,
           'one_time_keyboard' => true
       ]);
       
       return $this->telegram->sendMessage([
           'chat_id' => $chat_id,
           'text' => 'Silahkan tekan Share Phone Number kemudian share!',
           'reply_markup' => $keyboard
       ]);
   }
}
