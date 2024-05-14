<?php

namespace Spalopia\Tests\Integration\Spalopia\Health\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HealthCheckGetControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testReturnGetHealthResponseOk(): void
    {
        $this->client->request('GET', '/api/health-check');

        self::assertResponseIsSuccessful();
    }
}
