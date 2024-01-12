<?php

namespace Webmaster\ThemeCreator;

use Illuminate\Support\ServiceProvider;
use Webmaster\ThemeCreator\Commands\AdminControllerMakeCommand;
use Webmaster\ThemeCreator\Commands\AdminTabsMakeCommand;
use Webmaster\ThemeCreator\Commands\BannerMakeCommand;
use Webmaster\ThemeCreator\Commands\ConfigMakeCommand;
use Webmaster\ThemeCreator\Commands\ControllerMakeCommand;
use Webmaster\ThemeCreator\Commands\ProviderMakeCommand;
use Webmaster\ThemeCreator\Commands\RequestMakeCommand;
use Webmaster\ThemeCreator\Commands\ResourceAssetCssMakeCommand;
use Webmaster\ThemeCreator\Commands\ResourceAssetJsMakeCommand;
use Webmaster\ThemeCreator\Commands\ResourceLangMakeCommand;
use Webmaster\ThemeCreator\Commands\RouteAdminMakeCommand;
use Webmaster\ThemeCreator\Commands\RoutePublicMakeCommand;
use Webmaster\ThemeCreator\Commands\SidebarMakeCommand;
use Webmaster\ThemeCreator\Commands\ThemeGeneratorCommand;
use Webmaster\ThemeCreator\Commands\ThemeJsonMakeCommand;
use Webmaster\ThemeCreator\Commands\ViewAdminMakeCommand;
use Webmaster\ThemeCreator\Commands\ViewComposerMakeCommand;
use Webmaster\ThemeCreator\Commands\ViewErrorMakeCommand;
use Webmaster\ThemeCreator\Commands\ViewHomeMakeCommand;
use Webmaster\ThemeCreator\Commands\ViewLayoutMakeCommand;
use Webmaster\ThemeCreator\Commands\WebpackMakeCommand;

class ThemeCreatorServiceProvider extends ServiceProvider
{

    protected $commands = [
        ThemeGeneratorCommand::class,
        ProviderMakeCommand::class,
        ControllerMakeCommand::class,
        AdminControllerMakeCommand::class,
        RequestMakeCommand::class,
        ViewComposerMakeCommand::class,
        AdminTabsMakeCommand::class,
        ConfigMakeCommand::class,
        SidebarMakeCommand::class,
        BannerMakeCommand::class,
        ThemeJsonMakeCommand::class,
        WebpackMakeCommand::class,
        RouteAdminMakeCommand::class,
        RoutePublicMakeCommand::class,
        ResourceAssetJsMakeCommand::class,
        ResourceAssetCssMakeCommand::class,
        ResourceLangMakeCommand::class,
        ViewAdminMakeCommand::class,
        ViewErrorMakeCommand::class,
        ViewLayoutMakeCommand::class,
        ViewHomeMakeCommand::class
    ];

    public function register()
    {
        $this->commands($this->commands);
    }

    public function boot()
    {
        //
    }


}