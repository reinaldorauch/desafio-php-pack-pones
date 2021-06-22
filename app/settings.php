<?php
declare(strict_types=1);

use App\Application\Settings\Settings;
use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {

  // Global Settings Object
  $containerBuilder->addDefinitions([
    SettingsInterface::class => function () {
      return new Settings([
        'production'          => false,
        'displayErrorDetails' => true, // Should be set to false in production
        'logError'            => false,
        'logErrorDetails'     => false,
        'logger' => [
          'name' => 'slim-app',
          'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
          'level' => Logger::DEBUG,
        ],
        'doctrine_entity_paths' => [
          join(DIRECTORY_SEPARATOR, ['src', 'Domain', 'User']),
          join(DIRECTORY_SEPARATOR, ['src', 'Domain', 'Transaction'])
        ],
        'database_config' => [
          'driver' => 'pdo_mysql',
          'user' => 'desafio_pgp_pack_pones',
          'dbname' => 'desafio_pgp_pack_pones',
          'password' => 'desafio_pgp_pack_pones_user',
        ] 
      ]);
    }
  ]);
};
