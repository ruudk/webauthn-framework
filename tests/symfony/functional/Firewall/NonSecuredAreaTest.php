<?php

declare(strict_types=1);

namespace Webauthn\Tests\Bundle\Functional\Firewall;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * @internal
 */
final class NonSecuredAreaTest extends WebTestCase
{
    #[Test]
    public function aClientWantsToAccessOnNonSecuredResource(): void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/', [], [], [
            'HTTPS' => 'on',
        ]);

        static::assertResponseIsSuccessful();
        static::assertSame('Home', $client->getResponse()->getContent());
    }
}
