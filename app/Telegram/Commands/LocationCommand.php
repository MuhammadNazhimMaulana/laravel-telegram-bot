<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Commands\Command;
use Telegram;

class LocationCommand extends Command
{
    /**
    * @var string Nama Perintah
    */
    protected $name = 'lokasi';
    
    /**
    * @var array Alias Perintah
    */
    protected $aliases = ['location'];
    
    /**
    * @var string Deskripsi Perintah
    */
    protected $description = 'Perintah untuk mendapatkan lokasi';
    /**
    * {@inheritdoc}
    */
    
    public function handle()
    {
       $response = $this->getUpdate();
       $chat_id = $response->getChat()->getId();
       
       //Sending Location
       return $this->telegram->sendLocation([
           'chat_id' => $chat_id,
           'latitude' => -0.41529921292599764,
           'longitude' => 116.98872030709369,
       ]);
   }
}
