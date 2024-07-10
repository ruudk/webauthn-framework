<?php

declare(strict_types=1);

namespace Webauthn\Tests\Bundle\Functional\Entity;

use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @internal
 */
final class EntityTest extends KernelTestCase
{
    #[Test]
    #[DataProvider('expectedFields')]
    public function theSchemaIsValid(string $name, string $type, null|bool $nullable): void
    {
        //Given
        /** @var EntityManagerInterface $entityManager */
        $entityManager = self::getContainer()->get(EntityManagerInterface::class);

        //When
        $classMetadata = $entityManager->getClassMetadata(Credential::class);
        $fields = $classMetadata->fieldMappings;

        //Then
        static::assertArrayHasKey($name, $fields);
        $field = $fields[$name];
        static::assertSame($type, $field['type']);
        static::assertSame($nullable, $field['nullable']);

    }

    public static function expectedFields(): iterable
    {
        yield [
            'name' => 'publicKeyCredentialId',
            'type' => 'base64',
            'nullable' => null,
        ];
        yield [
            'name' => 'type',
            'type' => 'string',
            'nullable' => null,
        ];
        yield [
            'name' => 'transports',
            'type' => 'array',
            'nullable' => null,
        ];
        yield [
            'name' => 'attestationType',
            'type' => 'string',
            'nullable' => null,
        ];
        yield [
            'name' => 'trustPath',
            'type' => 'trust_path',
            'nullable' => null,
        ];
        yield [
            'name' => 'aaguid',
            'type' => 'aaguid',
            'nullable' => null,
        ];
        yield [
            'name' => 'credentialPublicKey',
            'type' => 'base64',
            'nullable' => null,
        ];
        yield [
            'name' => 'userHandle',
            'type' => 'string',
            'nullable' => null,
        ];
        yield [
            'name' => 'counter',
            'type' => 'integer',
            'nullable' => null,
        ];
        yield [
            'name' => 'otherUI',
            'type' => 'array',
            'nullable' => true,
        ];
        yield [
            'name' => 'backupEligible',
            'type' => 'boolean',
            'nullable' => true,
        ];
        yield [
            'name' => 'backupStatus',
            'type' => 'boolean',
            'nullable' => true,
        ];
        yield [
            'name' => 'uvInitialized',
            'type' => 'boolean',
            'nullable' => true,
        ];
    }
}
