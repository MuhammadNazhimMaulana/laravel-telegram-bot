<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram;

class PollCommand extends Command
{
    /**
    * @var string Nama Perintah
    */
    protected $name = 'poll';
    
    /**
    * @var array Alias Perintah
    */
    protected $aliases = ['send_poll'];
    
    /**
    * @var string Deskripsi Perintah
    */
    protected $description = 'Perintah untuk mengirimkan polling';
    /**
    * {@inheritdoc}
    */
    
    public function handle()
    {     
        $response = $this->getUpdate();
        $chat_id = $response->getChat()->getId();
        
        //Sending Poll
        return $this->telegram->sendPoll([
            'chat_id' => $chat_id,
            'question' => 'Siapakah yang Ganteng?',
            'options' => ['Dono', 'Doni', 'Joni']
        ]);
   }
}
