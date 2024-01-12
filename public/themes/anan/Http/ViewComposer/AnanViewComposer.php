<?php

namespace Themes\Anan\Http\ViewComposer;

use Modules\Media\Entities\File;
use Illuminate\Support\Facades\Cache;
use Modules\Menu\MegaMenu\MegaMenu;
use Illuminate\Contracts\View\View;

class AnanViewComposer
{
     /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'favicon' => $this->getMedia(setting('anan_favicon'))->path,
            'header_logo' => $this->getMedia(setting('anan_header_logo'))->path,
            'footer_logo' => $this->getMedia(setting('anan_footer_logo'))->path,
            'mobile_header_logo' => $this->getMedia(setting('anan_mobile_header_logo'))->path,
            'mainMenu' => $this->getPrimaryMenu(),
            'menuFooter1' => $this->getMenuFooter1(),
            'menuFooter2' => $this->getMenuFooter2(),
            'categoryMenu'  => $this->getCategoryMenu()
        ]);
    }

    private function getMedia($fileId)
    {
        return Cache::rememberForever(md5("files.{$fileId}"), function () use ($fileId) {
            return File::findOrNew($fileId);
        });
    }

    private function getPrimaryMenu()
    {
        return new MegaMenu(setting('anan_primary_menu'));
    }

    private function getCategoryMenu()
    {
        return new MegaMenu(setting('anan_category_menu'));
    }

    private function getMenuFooter1()
    {
        return new MegaMenu(setting('anan_footer_menu_one'));
    }

    private function getMenuFooter2()
    {
        return new MegaMenu(setting('anan_footer_menu_two'));
    }

}
