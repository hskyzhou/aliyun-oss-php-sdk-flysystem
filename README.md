# Flysystem Adapter for AliCloud OSS

[![Build Status](https://travis-ci.org/aliyun/aliyun-oss-php-sdk-flysystem.svg?branch=master)](https://travis-ci.org/aliyun/aliyun-oss-php-sdk-flysystem)
[![Coverage Status](https://coveralls.io/repos/github/aliyun/aliyun-oss-php-sdk-flysystem/badge.svg?branch=master)](https://coveralls.io/github/aliyun/aliyun-oss-php-sdk-flysystem?branch=master)

This is a Flysystem Adapter for the AliCloud OSS ~1.2.1

## Installation

```bash
composer require hskyzhou/aliyun-oss-flysystem
```

## 在config/filesystem.php中disk数组下增加配置
其中access_id,access_key,bucket,endpoint都是在阿里云中获取

'oss' => [
    'driver'     => 'oss',
    'access_id'  => env('OSS_ACCESS_ID'),
    'access_key' => env('OSS_ACCESS_KEY'),
    'bucket'     => env('OSS_BUCKET'),
    'endpoint'   => env('OSS_ENDPOINT'),
    'prefix'     => env('OSS_PREFIX'), // optional
    'schema' => env('OSS_SCHEMA'),   //确定访问是通过http或者https
],

## 在项目的.env配置中增加

OSS_ACCESS_ID=
OSS_ACCESS_KEY=
OSS_BUCKET=
OSS_ENDPOINT=
OSS_PREFIX=
OSS_SCHEMA=http