<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NodesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NodesTable Test Case
 */
class NodesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NodesTable
     */
    protected $Nodes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Nodes',
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
        $config = $this->getTableLocator()->exists('Nodes') ? [] : ['className' => NodesTable::class];
        $this->Nodes = $this->getTableLocator()->get('Nodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Nodes);

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
}
