<?php
declare(strict_types=1);

namespace Api\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
    public function initialize(): void
    {
        parent::initialize(); // TODO: Change the autogenerated stub

        $this->loadComponent('RequestHandler');
    }
}
