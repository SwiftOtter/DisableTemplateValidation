<?php
/**
 * @author Joseph Maxwell
 * @copyright SwiftOtter, Inc., 1/3/17
 * @website https://swiftotter.com
 **/

namespace SwiftOtter\DisableTemplateValidation\Plugin;

use Magento\Framework\{
    App\State,
    Config\File\ConfigFilePool
};

class FileValidator
{
    const MODE_DEVELOPMENT = 'development';
    private $reader;

    public function __construct(\Magento\Framework\App\DeploymentConfig\Reader $reader)
    {
        $this->reader = $reader;
    }

    public function afterIsValid($subject, $result)
    {
        if ($this->isDeveloperMode()) {
            return true;
        } else {
            return $result;
        }
    }

    private function isDeveloperMode()
    {
        $env = $this->reader->load(ConfigFilePool::APP_ENV);
        return ($env[State::PARAM_MODE] ?? self::MODE_DEVELOPMENT) === self::MODE_DEVELOPMENT;
    }
}