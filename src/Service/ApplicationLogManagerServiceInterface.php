<?php
declare(strict_types=1);

namespace App\Service;


use Cake\Datasource\EntityInterface;

interface ApplicationLogManagerServiceInterface
{
    public function getLastLogForApplication(int $id = null) : ?EntityInterface;
}
