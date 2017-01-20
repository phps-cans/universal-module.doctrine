
# Doctrine ORM universal module

This package integrates [doctrine/orm](https://github.com/doctrine/doctrine2) in any [container-interop](https://github.com/container-interop/service-provider) compatible framework/container.

## Installation

```
composer require thecodingmachine/symfony-console-universal-module
```

Once installed, you need to register the [`PSCS\Universal\Module\DoctrineServiceProvider`](src/DoctrineServiceProvider.php) into your container.

If your container supports Puli integration, you have nothing to do. Otherwise, refer to your framework or container's documentation to learn how to register *service providers*.

## Introduction

This service provider is meant to create a Symfony\Component\Console\Application.

## Provided services

This *service provider* provides the following services:

| Service name                | Description                          |
|-----------------------------|--------------------------------------|
| `HelperSet::class`          | An empty HelperSet                   |
| `Application::class`        | An empty console application         |


<small>Project template courtesy of <a href="https://github.com/thecodingmachine/service-provider-template">thecodingmachine/service-provider-template</a></small>
