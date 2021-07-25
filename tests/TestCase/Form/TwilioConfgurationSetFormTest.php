<?php
declare(strict_types=1);

namespace App\Test\TestCase\Form;

use App\Form\TwilioConfgurationSetForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\TwilioConfgurationSetForm Test Case
 */
class TwilioConfgurationSetFormTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Form\TwilioConfgurationSetForm
     */
    protected $TwilioConfgurationSet;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->TwilioConfgurationSet = new TwilioConfgurationSetForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TwilioConfgurationSet);

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
