<?php
namespace PSCS\Universal\Module;


use Doctrine\DBAL\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Interop\Container\ContainerInterface;
use Interop\Container\ServiceProvider;

class DoctrineServiceProvider implements ServiceProvider
{

    /**
     * Returns a list of all container entries registered by this service provider.
     *
     * - the key is the entry name
     * - the value is a callable that will return the entry, aka the **factory**
     *
     * Factories have the following signature:
     *        function(ContainerInterface $container, callable $getPrevious = null)
     *
     * About factories parameters:
     *
     * - the container (instance of `Interop\Container\ContainerInterface`)
     * - a callable that returns the previous entry if overriding a previous entry, or `null` if not
     *
     * @return callable[]
     */
    public function getServices()
    {
        return [
            "EntityPath" => function (ContainerInterface $container) {
                return $paths = array("");
            },
            "IsDevMode" => function (ContainerInterface $container) {
                return $paths = true;
            },
            "DbParams" => function(ContainerInterface $container){
                // the connection configuration
                return array(
                    'driver'   => 'pdo_mysql',
                    'user'     => 'root',
                    'password' => '',
                    'dbname'   => 'foo',
                );
            },
            Configuration::class =>function(ContainerInterface $container) {
                return Setup::createAnnotationMetadataConfiguration($container->get('EntityPath'), $container->get('IseDevMode'));
            },
            EntityManager::class =>function(ContainerInterface $container) {
                return EntityManager::create($container->get('DbParams'), $container->get(Configuration::class));
            }
        ];
    }
}