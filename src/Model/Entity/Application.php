<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Application Entity
 *
 * @property int $id
 * @property string $node_id
 * @property string $name
 * @property string $description
 * @property string $default_state
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Node $node
 * @property \App\Model\Entity\ApplicationLog[] $application_logs
 */
class Application extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'node_id' => true,
        'name' => true,
        'description' => true,
        'default_state' => true,
        'created' => true,
        'modified' => true,
        'node' => true,
        'application_logs' => true,
    ];
}
