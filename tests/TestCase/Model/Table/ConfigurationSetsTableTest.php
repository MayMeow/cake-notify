<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConfigurationSetsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConfigurationSetsTable Test Case
 */
class ConfigurationSetsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConfigurationSetsTable
     */
    protected $ConfigurationSets;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ConfigurationSets',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ConfigurationSets') ? [] : ['className' => ConfigurationSetsTable::class];
        $this->ConfigurationSets = $this->getTableLocator()->get('ConfigurationSets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ConfigurationSets);

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
