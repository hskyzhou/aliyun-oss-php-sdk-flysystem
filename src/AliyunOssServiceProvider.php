<?php 

namespace HskyZhou\Flysystem\AliyunOss;

use Illuminate\Support\ServiceProvider;
use Storage;
use League\Flysystem\Filesystem;
use OSS\OssClient;
use HskyZhou\Flysystem\AliyunOss\AliyunOssAdapter;
use HskyZhou\Flysystem\AliyunOss\Plugins\PutFile;
use HskyZhou\Flysystem\AliyunOss\Plugins\PublicUrl;

class AliyunOssServiceProvider extends ServiceProvider
{
	/**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('oss', function ($app, $config) {
            $accessId = $config['access_id'];
            $accessKey = $config['access_key'];
            $endPoint = $config['endpoint'];
            $bucket = $config['bucket'];
            $prefix = null;
            if (isset($config['prefix'])) {
                $prefix = $config['prefix'];
            }
            $client = new OssClient($accessId, $accessKey, $endPoint);
            $adapter = new AliyunOssAdapter($client, $bucket, $prefix, $config);

            $filesystem = new Filesystem($adapter);

            $filesystem->addPlugin(new PutFile());
            $filesystem->addPlugin(new PublicUrl());

            return $filesystem;
        });
    }
}