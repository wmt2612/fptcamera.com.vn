<?php

namespace Webmaster\ThemeCreator\Commands;

use Nwidart\Modules\Commands\GeneratorCommand;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Webmaster\ThemeCreator\Stub;

class ControllerMakeCommand extends GeneratorCommand
{

    use ModuleCommandTrait;
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'theme:make-controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new controller.';


    protected $argumentName = 'name';


    protected function getTemplateContents()
    {
        return (new Stub($this->getStubName(), [
            'NAMESPACE' => 'Themes\\'. $this->getThemeName() .'\\Http\\Controllers'
        ]))->render();
    }

    protected function getDestinationFilePath()
    {
        $path = public_path("themes\\".$this->getThemeName() ."\\Http\Controllers\\");
        $public = $path .'HomeController.php';
        return $public;
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the controller.'],
        ];
    }

    protected function getOptions()
    {
        return [
            ['admin', 'a', InputOption::VALUE_OPTIONAL, 'The admin will implements.'],
        ];
    }

    private function getThemeName()
    {
        return ucfirst( strtolower ($this->argument('name')));
    }

    protected function getStubName(): string
    {
        return '/controller.stub';
    }

}