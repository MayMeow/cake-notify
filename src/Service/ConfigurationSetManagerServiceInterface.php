<?php
declare(strict_types=1);

namespace App\Service;

use App\Model\Entity\ConfigurationSet;
use Cake\Datasource\EntityInterface;

interface ConfigurationSetManagerServiceInterface
{
    /**
     * @param string $type
     * @return ConfigurationSet
     */
    public function getConfiguration(string $type) : EntityInterface;
}
