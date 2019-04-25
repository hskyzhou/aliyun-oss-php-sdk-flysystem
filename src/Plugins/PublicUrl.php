<?php

namespace HskyZhou\Flysystem\AliyunOss\Plugins;

use League\Flysystem\Config;
use League\Flysystem\Plugin\AbstractPlugin;

/**
 * 获取public url
 *
 * @author  RobertYue19900425 <yueqiankun@163.com>
 */
class PublicUrl extends AbstractPlugin
{
    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'publicUrl';
    }

    /**
     * Handle.
     *
     * @param string $path
     * @param string $localFilePath
     * @param array  $config
     * @return bool
     */
    public function handle($path, array $config = [])
    {
        if (! method_exists($this->filesystem, 'getAdapter')) {
            return false;
        }

        if (! method_exists($this->filesystem->getAdapter(), 'getPublicUrl')) {
            return false;
        }

        $config = new Config($config);
        if (method_exists($this->filesystem, 'getConfig')) {
            $config->setFallback($this->filesystem->getConfig());
        }

        return $this->filesystem->getAdapter()->getPublicUrl($path);
    }
}
