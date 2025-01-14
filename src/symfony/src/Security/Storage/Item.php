<?php

declare(strict_types=1);

namespace Webauthn\Bundle\Security\Storage;

use Webauthn\PublicKeyCredentialOptions;
use Webauthn\PublicKeyCredentialUserEntity;

final readonly class Item
{
    public function __construct(
        private PublicKeyCredentialOptions $publicKeyCredentialOptions,
        private ?PublicKeyCredentialUserEntity $publicKeyCredentialUserEntity
    ) {
    }

    public static function create(
        PublicKeyCredentialOptions $publicKeyCredentialOptions,
        ?PublicKeyCredentialUserEntity $publicKeyCredentialUserEntity
    ): self {
        return new self($publicKeyCredentialOptions, $publicKeyCredentialUserEntity);
    }

    public function getPublicKeyCredentialOptions(): PublicKeyCredentialOptions
    {
        return $this->publicKeyCredentialOptions;
    }

    public function getPublicKeyCredentialUserEntity(): ?PublicKeyCredentialUserEntity
    {
        return $this->publicKeyCredentialUserEntity;
    }
}
