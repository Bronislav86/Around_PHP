<?php
namespace App\EventSender;

use App\Telegram\TelegramAPI;

class EventSender
{
    private TelegramAPI $telegram;

    public function __construct(TelegramAPI $telegram)
    {

        $this->telegram = $telegram;
    }

    public function sendMessage(string $receiver, string $message)
    {
        $this->telegram->sendMessage($receiver, $message);

        echo date('d.m.y H:i') . " Я отправил сообщение $message получателю с id $receiver\n";
    }
}