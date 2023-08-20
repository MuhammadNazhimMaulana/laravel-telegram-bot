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
     * @var string Command Pattern
     */
    protected $pattern = '{first_argument} {second_argument}';

    /**
    * {@inheritdoc}
    */
    
    public function handle()
    {
        // Get Arguments
        $args = $this->getArguments();

        // Find Chat
       $contact = Contact::where('first_name', 'Nazhim')->first();

        //Sending Message with args
        return $this->telegram->sendMessage([
        'chat_id' => $contact->chat_id,
        'text' => "Anjay Mas e "  . ($args['first_argument'] ? $args['first_argument'] . ' ' : ' ') . ($args['second_argument'] ? $args['second_argument'] : '')
    ]);
   }
}
