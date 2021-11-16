<?php

declare(strict_types=1);

namespace Dah\JobApplication\Testing;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

abstract class AbstractIntegrationTest extends TestCase
{
    private ?ContainerInterface $container = null;

    public function setUp(): void
    {
        require_once __DIR__ . '/../../bootstrap.php';
    }

    protected function getContainer(): ContainerInterface
    {
        if ($this->container === null) {
            $this->container = require __DIR__ . '/../../config/container.php';
        }

        return $this->container;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->container = null;
    }
}
