<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use App\Models\Contact;
use Telegram;

class ForwardMessageCommand extends Command
{
    /**
    * @var string Nama Perintah
    */
    protected $name = 'forward';
    
    /**
    * @var array Alias Perintah
    */
    protected $aliases = ['send_forward_message'];
    
    /**
    * @var string Deskripsi Perintah
    */
    protected $description = 'Perintah untuk meneruskan pesan';
    /**
    * {@inheritdoc}
    */
    
    public function handle()
    {
        // Find Chat
       $contact_from = Contact::where('first_name', 'Nazhim')->first();
       $contact_to = Contact::where('first_name', 'Muhammad Nazhim')->first();

       //Sending Location
       return $this->telegram->forwardMessage([
           'chat_id' => $contact_to->chat_id,
           'from_chat_id' => $contact_from->chat_id,
           'message_id' => 230
       ]);
   }
}
