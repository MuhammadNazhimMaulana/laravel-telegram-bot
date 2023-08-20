<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram;

class HelpCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'help';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['daftar_perintah'];

    /**
     * @var string Command Description
     */
    protected $description = 'Menampilkan daftar perintah yang tersedia.';

    /**
     * {@inheritdoc}
     */
    public function handle()
    
    {
        $response = $this->getUpdate();
        $first_name = $response->getChat()->getFirstName();
        
        $commands = $this->getTelegram()->getCommands();
        $listCommand = '';
        foreach ($commands as $name => $command) {

            // Finding The one with arguments
            if($name == 'message')
            {
                $listCommand .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription(). '. Note, untuk message harus memberikan dua argumen');
            }else{
                $listCommand .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription());
            }
        }
        
        // PHP_EOL (enter)
        $text = 'Hallo '.$first_name.','.PHP_EOL.'Selamat datang di layanan Bot Laravel Sederhana, untuk saat ini bot ini dalam pengembangan. Berikut adalah beberapa perintah yang bisa digunakan :'.PHP_EOL.PHP_EOL. $listCommand;
        
        return $this->replyWithMessage(compact('text'));
    }
}
