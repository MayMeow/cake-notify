<?php

namespace Api\Controller\V1;

use Api\Controller\AppController;

class ApplicationsController extends AppController
{
    /**
     * curl -i --data state=1 http://localhost:8765/api/v1/applications/create-log/1.json
     *
     * @param string $id
     */
    public function createLog($id = "") {
        $text = [
            'id' => $id,
            'curent_state' => $this->request->getData('state')
        ];

        $this->set('text', $text);

        $this->viewBuilder()->setOption('serialize', 'text');
    }
}
