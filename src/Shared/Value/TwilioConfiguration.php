<?php
declare(strict_types=1);

namespace App\Shared\Value;

use App\Model\Entity\ConfigurationSet;
use Cake\Datasource\EntityInterface;
use function PHPUnit\Framework\objectHasAttribute;

class TwilioConfiguration
{
    protected string $sid;

    protected string $token;

    protected string $sender;

    /**
     * @return string
     */
    public function getSid(): string
    {
        return $this->sid;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getSender(): string
    {
        return $this->sender;
    }

    /**
     * @param EntityInterface|ConfigurationSet $configurationSet
     */
    public function load(EntityInterface $configurationSet) : void
    {
        $settingString = json_decode($configurationSet->config_set);

        $settingVars = get_object_vars($settingString);

        foreach ($settingVars as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }
}
