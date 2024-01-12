<?php

namespace Webmaster\ThemeCreator\Commands;

use Nwidart\Modules\Commands\GeneratorCommand;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Webmaster\ThemeCreator\Stub;

class ViewComposerMakeCommand extends GeneratorCommand
{

    use ModuleCommandTrait;
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'theme:make-vcomposer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new view composer.';


    protected $argumentName = 'name';


    protected function getTemplateContents()
    {
        return (new Stub($this->getStubName(), [
            'NAMESPACE' => 'Themes\\'. $this->getThemeName() .'\\Http\ViewComposer',
            'THEME_NAME' => $this->getThemeName(),
            'VARIBALE_NAME' => $this->getVariableName()
        ]))->render();
    }

    protected function getDestinationFilePath()
    {
        $path = public_path("themes\\".$this->getThemeName() ."\\Http\ViewComposer\\");
        $public = $path . $this->getThemeName() .'TabsComposer.php';
        return $public;
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the admin view composer.'],
        ];
    }

    private function getVariableName()
    {
        return strtolower ($this->argument('name'));
    }

    private function getThemeName()
    {
        return ucfirst( strtolower ($this->argument('name')));
    }

    protected function getStubName(): string
    {
        return '/view-composer.stub';
    }

}