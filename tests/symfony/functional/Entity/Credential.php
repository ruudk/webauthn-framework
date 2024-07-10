<?php

declare(strict_types=1);

namespace Webauthn\Tests\Bundle\Functional\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Webauthn\PublicKeyCredentialSource;

#[ORM\Entity]
#[Orm\Table(name: 'credentials')]
class Credential extends PublicKeyCredentialSource
{
    #[ORM\Id]
    #[ORM\Column(type: Types::STRING, length: 10)]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    public string $id;
}
