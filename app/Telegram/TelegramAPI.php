<?php

namespace App\Telegram;

interface TelegramAPI {

    public function __construct(string $token);
    
        /** @return TelegramMessageDto[] */
    
    public function getMessages(int $offset): array;

    public function sendMessage(string $chatId, string $text);
}