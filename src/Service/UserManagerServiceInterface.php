<?php
declare(strict_types=1);

namespace App\Service;

use Cake\Datasource\EntityInterface;

interface UserManagerServiceInterface
{
    public function verifyApiToken(string $apiToken ) : bool;
}
