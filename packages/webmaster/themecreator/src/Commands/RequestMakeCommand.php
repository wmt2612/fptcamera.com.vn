<?php

namespace Webmaster\ThemeCreator\Commands;

use Nwidart\Modules\Commands\GeneratorCommand;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Webmaster\ThemeCreator\Stub;

class RequestMakeCommand extends GeneratorCommand
{

    use ModuleCommandTrait;
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'theme:make-request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new request.';

    protected $argumentName = 'name';


    protected function getTemplateContents()
    {
        return (new Stub($this->getStubName(), [
            'NAMESPACE' => 'Themes\\'. $this->getThemeName() .'\\Http\\Requests',
            'THEME_NAME' => $this->getThemeName(),
            'VARIBALE_NAME' => $this->getVariableName(),

        ]))->render();
    }

    protected function getDestinationFilePath()
    {
        $path = public_path("themes\\".$this->getThemeName() ."\\Http\Requests\\");
        $public = $path .$this->getVariableName().'.php';
        return $public;
    }

    protected function getArguments()
    {
        return [
            ['theme', InputArgument::REQUIRED, 'The name of theme.'],
            ['name', InputArgument::REQUIRED, 'The name of the request.'],
        ];
    }


    private function getThemeName()
    {
        return ucfirst( $this->argument('theme'));
    }

    private function getVariableName()
    {
        return $this->argument('name');
    }

    protected function getStubName(): string
    {
        return '/request.stub';
    }

}
