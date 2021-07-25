<?php
declare(strict_types=1);

namespace App\Service;

use Cake\Datasource\ModelAwareTrait;

class AppService
{
    use ModelAwareTrait;

    public function __construct()
    {
        $this->initialize();
    }

    public function initialize()
    {

    }
}
