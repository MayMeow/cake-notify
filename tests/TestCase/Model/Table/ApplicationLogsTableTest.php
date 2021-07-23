<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicationLogsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicationLogsTable Test Case
 */
class ApplicationLogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicationLogsTable
     */
    protected $ApplicationLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ApplicationLogs',
        'app.Applications',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ApplicationLogs') ? [] : ['className' => ApplicationLogsTable::class];
        $this->ApplicationLogs = $this->getTableLocator()->get('ApplicationLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ApplicationLogs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
