<?php

namespace tests\ApiUnit;

use ApiUnitTester;
use app\console\fixtures\PolyclinicPayloadFixture;
use app\console\fixtures\PolyclinicsFixture;
use app\forms\FilterForm;
use app\forms\IdForm;
use app\models\Polyclinics;
use app\repositories\databases\PolyclinicsRepository;
use app\services\PolyclinicsService;
use Codeception\Exception\ModuleException;
use JetBrains\PhpStorm\NoReturn;
use Yii;

class PolyclinicsTest extends \Codeception\Test\Unit
{
    protected ApiUnitTester $tester;

    protected PolyclinicsService $service;

    public function _fixtures(): array
    {
        return [
            //'polyclinics' => PolyclinicsFixture::class,
            //'payload' => PolyclinicPayloadFixture::class,
        ];
    }

    protected function _before()
    {
        $a = new Polyclinics();
        codecept_debug($a); die;
        $this->service = new PolyclinicsService(
            new PolyclinicsRepository(),
            new IdForm(),
            new FilterForm(),
        );
    }

    /**
     * @throws ModuleException
     */
    protected function grabFixture(string $nameFixture): array
    {
        return ($this->tester->grabFixture($nameFixture))->data;
    }

    #[NoReturn] public function testItem(): void
    {
        $payload = $this->grabFixture('payload');

        var_dump($payload); die;
    }
}