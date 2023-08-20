<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Telegram;

class MainBotController extends Controller
{
    public function setWebhook()
    {
        $response = Telegram::setWebhook(['url' => env('TELEGRAM_WEBHOOK_URL')]);

        $data = [
            'response' => $response
        ];

        return view('Chat/index', $data);
    }

    public function commandHandlerWebhook()
    {
        $updates = Telegram::commandsHandler(true);
        $chat_id = $updates->getChat()->getId();
        $username = $updates->getChat()->getFirstName();

        // Testing
        // error_log($updates);

        // Check Contact Exist or not
        if(!Contact::where('chat_id', $chat_id)->first())
        {
            // Save Contact Data
            $new_contact = new Contact;
            $new_contact->chat_id = $chat_id;
            $new_contact->first_name = $username;
            $new_contact->save();
        }

        // Checking Sent Message
        if(strtolower($updates->getMessage()->getText() === 'halo')) return Telegram::sendMessage([
            'chat_id' => $chat_id, 
            'text' => 'Halo ' . $username 
        ]);

        // Checking Phone Number
        $phone_number = array_key_exists('contact', $updates['message']) ? $updates['message']['contact']['phone_number'] : null;
        if($phone_number) return Telegram::sendMessage([
            'chat_id' => $chat_id, 'text' => 'Nomor telepon Anda adalah ' . $phone_number
        ]);
    }
    
}
