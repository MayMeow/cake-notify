<?php
declare(strict_types=1);

namespace Tools\Test\TestCase\Command;

use Cake\TestSuite\ConsoleIntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Tools\Command\GenerateSaltCommand;

/**
 * Tools\Command\GenerateSaltCommand Test Case
 *
 * @uses \Tools\Command\GenerateSaltCommand
 */
class GenerateSaltCommandTest extends TestCase
{
    use ConsoleIntegrationTestTrait;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->useCommandRunner();
    }
}
