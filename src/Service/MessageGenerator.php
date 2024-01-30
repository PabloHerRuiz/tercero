<?php
namespace App\Service;

class MessageGenerator
{
    public function getHappyMessage(): string
    {
        $messages = [
            'Puto Amo',
        ];

        $index = array_rand($messages);

        return $messages[$index];
    }
}