<?php

namespace Webmaster\ThemeCreator\Commands;

use Nwidart\Modules\Commands\GeneratorCommand;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Webmaster\ThemeCreator\Stub;

class SidebarMakeCommand extends GeneratorCommand
{

    use ModuleCommandTrait;
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'theme:make-sidebar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new sidebar.';

    protected $argumentName = 'name';


    protected function getTemplateContents()
    {
        return (new Stub($this->getStubName(), [
            'NAMESPACE' => 'Themes\\'. $this->getThemeName() .'\\Sidebar',
            'THEME_NAME' => $this->getThemeName(),
            'VARIBALE_NAME' => $this->getVariableName(),

        ]))->render();
    }

    protected function getDestinationFilePath()
    {
        $path = public_path("themes\\".$this->getThemeName() ."\\Sidebar\\");
        $public = $path . 'SidebarExtender.php';
        return $public;
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the sidebar.'],
        ];
    }


    private function getThemeName()
    {
        return ucfirst( strtolower ($this->argument('name')));
    }

    private function getVariableName()
    {
        return strtolower ($this->argument('name'));
    }
    
    protected function getStubName(): string
    {
        return '/sidebar.stub';
    }

}