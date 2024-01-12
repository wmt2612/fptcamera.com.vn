<?php

namespace Webmaster\ThemeCreator\Commands;

use Nwidart\Modules\Commands\GeneratorCommand;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Webmaster\ThemeCreator\Stub;

class ProviderMakeCommand extends GeneratorCommand
{

    use ModuleCommandTrait;
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'theme:make-provider';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new provider.';


    protected $argumentName = 'name';


    protected function getTemplateContents()
    {
        return (new Stub($this->getStubName(), [
            'NAMESPACE' => 'Themes\\'.$this->getThemeName().'\\Providers',
            'CLASS'     => 'ThemeServiceProvider',
        ]))->render();
    }

    protected function getDestinationFilePath()
    {
        $path = public_path("themes\\".$this->getThemeName() ."\\Providers\\");
        $public = $path . 'ThemeServiceProvider.php';
        return $public;
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the provider.'],
        ];
    }

    private function getThemeName()
    {
        return ucfirst($this->argument('name'));
    }

    protected function getStubName(): string
    {
        return '/provider.stub';
    }

}