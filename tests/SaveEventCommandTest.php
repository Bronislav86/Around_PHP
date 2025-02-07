<?php

use PHPUnit\Framework\TestCase;

class SaveEventCommandTest extends TestCase
{

    /**
     * @dataProvider isNeedHelpDataProvider
     */

    public function testSaveEventCommandTest(array $options, bool $isNeedHelp): void 
    {
        $saveEventCommand = new App\Commands\SaveEventCommand(new App\Application(dirname(__DIR__)));

        $result = $saveEventCommand->isNeedHelp($options);

        self::assertEquals($result, $isNeedHelp);

    }

    public function isNeedHelpDataProvider()
    {
        return [
            [
                [
                    'name' => "some-name",
                    'text' => "some-text",
                    'receiver' => "some-receiver",
                    'cron' => "some-cron",
                    // 'help' => "some-hepl",
                    // 'h' => "some-h"
                ],
                false
            ],
            [
                [
                    'name' => "some-name",
                    'text' => "some-text",
                    'receiver' => "some-receiver",
                    'cron' => "some-cron",
                    'help' => "some-hepl",
                    'h' => null
                ],
                true
            ],
            [
                [
                    'name' => "some-name",
                    'text' => "some-text",
                    'receiver' => "some-receiver",
                    'cron' => "some-cron",
                    'help' => null,
                    'h' => "some-h"
                ],
                true
            ],
            [
                [
                    'name' => "some-name",
                    'text' => "some-text",
                    'receiver' => "some-receiver",
                    'cron' => null,
                ],
                true
            ],
            [
                [
                    'name' => "some-name",
                    'text' => "some-text",
                    'receiver' => null,
                    'cron' => "some-cron",

                ],
                true
            ],
        ];
    }
}