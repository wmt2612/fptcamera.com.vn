<?php

namespace Webmaster\ThemeCreator\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Nwidart\Modules\Commands\GeneratorCommand;
use Nwidart\Modules\Support\Config\GenerateConfigReader;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputOption;
use Webmaster\ThemeCreator\Stub;

class ThemeMakeCommand extends GeneratorCommand
{

    use ModuleCommandTrait;

    /**
     * The name of argument being used.
     *
     * @var string
     */
    protected $argumentName = 'name';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'theme:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new theme.';



    public function getDefaultNamespace() : string
    {
        $module = $this->laravel['modules'];
        dd($module);
        return $module->config('paths.generator.controller.namespace') ?: $module->config('paths.generator.controller.path', 'Http/Controllers');
    }

    protected function getTemplateContents()
    {
        return (new Stub($this->getStubName(), [
            'NAMESPACE' => 'Webmaster\\ThemeCreator',
            'CLASS'     => 'ThemeServiceProvider',
        ]))->render();
    }

    protected function getDestinationFilePath()
    {
        $path = public_path('themes\\abc\\');
        $public = $path . 'ThemeServiceProvider.php';
        return $public;
    }

    protected function getOptions()
    {
        return [
            ['interface', 'i', InputOption::VALUE_OPTIONAL, 'The interface will implements.'],
        ];
    }

    private function getFileName()
    {
        return Str::studly($this->argument('name'));
    }

    protected function getStubName(): string
    {
        return '/repo-class.stub';
    }

}