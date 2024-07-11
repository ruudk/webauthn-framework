<?php

declare(strict_types=1);

namespace Webauthn\Tests\MetadataService\Unit;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\SerializerInterface;
use Webauthn\AttestationStatement\AttestationStatementSupportManager;
use Webauthn\Denormalizer\WebauthnSerializerFactory;

/**
 * @internal
 */
abstract class MdsTestCase extends TestCase
{
    protected function getSerializer(): SerializerInterface
    {
        return (new WebauthnSerializerFactory(AttestationStatementSupportManager::create()))->create();
    }
}
