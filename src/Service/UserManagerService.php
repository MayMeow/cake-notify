<?php
declare(strict_types=1);

namespace App\Service;

use App\Exceptions\WrongApiKeyException;
use Cake\Auth\AbstractPasswordHasher;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Datasource\EntityInterface;

/**
 * Class UserManagerService
 * @package App\Service
 * @property \App\Model\Table\UsersTable $Users;
 */
class UserManagerService extends AppService implements UserManagerServiceInterface
{

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub

        $this->loadModel('Users');
    }

    /**
     * @param string $apiToken
     * @return EntityInterface
     * @throws WrongApiKeyException
     */
    public function verifyApiToken(string $apiToken): bool
    {
        $user = $this->Users->find()->where(['Users.api_key_plain LIKE' => $apiToken])->first();
        $hasher = new DefaultPasswordHasher();

        if (!$user) {
            throw new WrongApiKeyException('Wrong Api Key');
        }

        if (!$hasher->check($apiToken, $user->api_key)) {
            throw new WrongApiKeyException('Wrong Api Key');
        }

        return true;
    }
}