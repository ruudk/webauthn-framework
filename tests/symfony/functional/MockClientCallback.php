<?php

declare(strict_types=1);

namespace Webauthn\Tests\Bundle\Functional;

use Assert\Assertion;
use RuntimeException;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * @internal
 */
final class MockClientCallback
{
    /**
     * @var ResponseInterface[]
     */
    private array $responses = [];

    public function __invoke(string $method, string $url, array $options = []): ?ResponseInterface
    {
        $key = $method . '-' . $url;
        if (! isset($this->responses[$key])) {
            throw new RuntimeException(sprintf(
                'Unable to find a response for a %s request to the URL %s',
                $method,
                $url
            ));
        }

        return $this->responses[$key];
    }

    /**
     * @param ResponseInterface[] $responses
     */
    public function addResponses(array $responses): self
    {
        Assertion::allIsInstanceOf($responses, ResponseInterface::class, 'Invalid argument');
        $this->responses = $responses;

        return $this;
    }
}
