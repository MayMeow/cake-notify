<?php
declare(strict_types=1);

namespace App\Service;

use App\Model\Entity\ApplicationLog;
use Cake\Datasource\EntityInterface;

/**
 * Class ApplicationLogManagerService
 * @package App\Service
 * @property \App\Model\Table\ApplicationLogsTable $ApplicationLogs;
 */
class ApplicationLogManagerService extends AppService implements ApplicationLogManagerServiceInterface
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub

        $this->loadModel('ApplicationLogs');
    }

    /**
     * @param int|null $id
     * @return EntityInterface|ApplicationLog
     */
    public function getLastLogForApplication(int $id = null): ?EntityInterface
    {
        return $this->ApplicationLogs->find()->where(['ApplicationLogs.application_id' => $id])
            ->orderDesc('created')->first();
    }
}
