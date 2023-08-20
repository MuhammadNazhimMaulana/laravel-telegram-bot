<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use App\Models\Contact;
use Telegram;

class MessageCommand extends Command
{
    /**
    * @var string Nama Perintah
    */
    protected $name = 'message';
    
    /**
    * @var array Alias Perintah
    */
    protected $aliases = ['send_message'];
    
    /**
    * @var string Deskripsi Perintah
    */
    protected $description = 'Perintah untuk mengirimkan pesan';
    /**
    * {@inheritdoc}
    */
    
    public function handle()
    {
        // Find Chat
       $contact = Contact::where('first_name', 'Aef')->first();

       //Sending Location
       return $this->telegram->sendMessage([
           'chat_id' => $contact->chat_id,
           'text' => "Anjay Mas e"
       ]);
   }
}
