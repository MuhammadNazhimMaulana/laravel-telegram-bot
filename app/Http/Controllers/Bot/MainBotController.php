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

        // Check Updates
        $this->checkUpdate($updates, $chat_id, $username);
    }
    
    private function checkUpdate($updates, $chat_id, $username)
    {
        // error_log(implode(' ', $updates['message']['location']));
        
        // Checking Sent Message
        if(strtolower($updates->getMessage()->getText() === 'halo')) return Telegram::sendMessage([
            'chat_id' => $chat_id, 
            'text' => 'Halo ' . $username 
        ]);

        // Checking Phone Number
        $phone_number = array_key_exists('contact', $updates['message']) ? $updates['message']['contact']['phone_number'] : null;
        
        // Check If There is pone number or not
        if($phone_number) return Telegram::sendMessage([
            'chat_id' => $chat_id, 
            'text' => 'Nomor telepon Anda adalah ' . $phone_number
        ]);
        
        // Check Location
        $location = array_key_exists('location', $updates['message']) ? $updates['message']['location'] : null;

        // Send Location detail
        if($location) return Telegram::sendMessage([
            'chat_id' => $chat_id, 
            'text' => 'Lokasi yang anda kirim memiliki detail seperti ini:'.PHP_EOL.'Longitude:' . $location['latitude'] .PHP_EOL.'Latitude: '. $location['longitude'] . $phone_number
        ]);

        // Last Thing
        app('App\Http\Controllers\Bot\MessageController')->message($updates, $chat_id, $username);
    }
}
