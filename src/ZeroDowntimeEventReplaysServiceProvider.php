<?php

namespace Mannum\ZeroDowntimeEventReplays;

use Mannum\ZeroDowntimeEventReplays\Repositories\RedisReplayRepository;
use Mannum\ZeroDowntimeEventReplays\Repositories\ReplayRepository;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Mannum\ZeroDowntimeEventReplays\Commands\ZeroDowntimeEventReplaysCommand;

class ZeroDowntimeEventReplaysServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('zero-downtime-event-replays')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_zero-downtime-event-replays_table')
            ->hasCommand(ZeroDowntimeEventReplaysCommand::class);
    }

    public function register()
    {
        $this->app->bind(ReplayRepository::class, function(){
            return  new RedisReplayRepository();
        });
        return parent::register(); // TODO: Change the autogenerated stub
    }
}
