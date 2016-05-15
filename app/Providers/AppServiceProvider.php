<?php

namespace App\Providers;

use App\Domain\Entities\Task;
use App\Domain\Repositories\TaskRepository;
use App\Infrastructure\Repositories\DoctrineTaskRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(\LaravelDoctrine\ORM\DoctrineManager $doctrineManager) {

        parent::boot();

        // Adding mapping server type to Doctrine type
        $doctrineManager->extendAll(function (\Doctrine\ORM\Configuration $configuration,
                \Doctrine\DBAL\Connection $connection,
                \Doctrine\Common\EventManager $eventManager) {

            $connection->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
     public function register()
    {
        $this->app->bind(TaskRepository::class, function (Application $app) {
            return new DoctrineTaskRepository(
                $app->make('em'),
                new ClassMetadata(Task::class)
            );
        });
        $this->app->bind(PostRepository::class, function (Application $app) {
            return new DoctrinePostRepository(
                $app->make('em'),
                new ClassMetadata(Post::class)
            );
        });
    }
}
