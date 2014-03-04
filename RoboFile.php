<?php
class Robofile extends \Robo\Tasks
{
    // define public methods as commands
    public function updateIdehelper()
    {
    	$this->say('Update barryvdh/laravel-ide-helper');
    	$this->taskExecStack('Update barryvdh/laravel-ide-helper')
 			->stopOnFail()
 			->exec('php artisan clear-compiled')
 			->exec('php artisan ide-helper:generate')
 			->exec('php artisan optimize')
 			->run();
    }
}