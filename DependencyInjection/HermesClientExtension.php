<?php
namespace ClassifiedsMaciej\HermesClientBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class HermesClientExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.xml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $def = $container->getDefinition('guzzle_client');
        
        $config['guzzle']['http_errors'] = $config['guzzle']['http_errors'] ?? false;
        $def->replaceArgument(0, [
            $config['guzzle'] ?? ['http_errors' => false]
        ]);

        $def = $container->getDefinition('hermes_client');
        $def->replaceArgument(1, $config['base_url']);
        $def->replaceArgument(2, $config['retries'] ?? 3);
        $def->replaceArgument(3, $config['retry_sleep'] ?? 10);
    }
}
