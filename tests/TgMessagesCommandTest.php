<?php

use PHPUnit\Framework\TestCase;
use App\Commands\TgMessagesCommand;
use App\Telegram\TelegramApiImpl;
use App\Application;

class TgMessagesCommandTest extends TestCase
{
    public function testRun()
    {
        // Создаем мок для TelegramApiImpl
        $mockTelegramApi = $this->createMock(TelegramApiImpl::class);

        $mockTelegramApi->method('getMessages')
                         ->with(0)
                         ->willReturn([
                             'offset' => 0,
                             'result' => [
                                 ['message' => 'Test message 1'],
                                 ['message' => 'Test message 2']
                             ]
                         ]);

        $mockApp = $this->createMock(Application::class);
        $mockApp->method('env')
                ->with('TELEGRAM_TOKEN')
                ->willReturn('fake_token');

        $command = new TgMessagesCommand($mockApp);

        ob_start();
        $command->run();
        $output = ob_get_clean();

        $expectedOutput = json_encode([
            ['message' => 'Test message 1'],
            ['message' => 'Test message 2']
        ]);
        $this->assertEquals($expectedOutput, $output);
    }
}
