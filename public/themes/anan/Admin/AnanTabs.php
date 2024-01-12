<?php

namespace Themes\Anan\Admin;

use Modules\Admin\Ui\Tabs;
use Modules\Admin\Ui\Tab;
use Modules\Tag\Entities\Tag;
use Themes\Anan\Banner;
use Modules\Menu\Entities\Menu;
use Modules\Page\Entities\Page;
use Modules\Media\Entities\File;
use Modules\Slider\Entities\Slider;
use Illuminate\Support\Facades\Cache;
use Modules\Group\Entities\Group;
use Modules\Category\Entities\Category;

class AnanTabs extends Tabs
{
    /**
     * Make new tabs with groups.
     *
     * @return void
    */

    public function make()
    {
        $this->group('general_settings', trans('anan::anan.tabs.group.general_settings'))
            ->active()
            ->add($this->general())
            ->add($this->logo())
            ->add($this->menus())
            // ->add($this->footer())
            ->add($this->newsletter())
            // ->add($this->features())
            // ->add($this->productPage())
            ->add($this->socialLinks());

        $this->group('home_settings', trans('anan::anan.tabs.group.home_setting'))
            ->add($this->homeBanner())
            ->add($this->dealSection())
            ->add($this->justForYouSection())
            ->add($this->newestProductSection())
            ->add($this->customV1Section());

        $this->group('blog_settings', trans('anan::anan.tabs.group.blog_setting'))
            ->add($this->blogCategory());

        $this->group('page_setting', trans('anan::anan.tabs.group.page_setting'))
            ->add($this->footer())
            ->add($this->productSidebar());

    }

    private function productSidebar()
    {
        return tap(new Tab('product_sidebar', 'Single Product'), function (Tab $tab) {
            $tab->weight(10);
            $tab->view('admin.anan.tabs.product_sidebar');
        });
    }

    // Home
    private function homeBanner()
    {
        return tap(new Tab('homebanner', 'Banner'), function (Tab $tab) {
            $tab->weight(10);
            $tab->view('admin.anan.tabs.homebanner', [
                'homebanner01' => $this->getMedia(setting('homebanner01')),
                'homebanner02' => $this->getMedia(setting('homebanner02')),
            ]);
        });
    }
  
   private function dealSection()
    {
        $sortTypes = [
            'DESC' => 'Newest',
            'ASC' => 'Oldest',
        ];
        $itemTypes = [
            'GET_BY_CATEGORY' => 'Category',
            'DEFAULT' => 'Default',
        ];
        return tap(new Tab('home_deal_section', 'Deal Section'), function (Tab $tab) use($sortTypes, $itemTypes){
            $tab->weight(11);
            $tab->view('admin.anan.tabs.home.deal', [
                'categories' => Category::treeList(),
                'sortTypes' => $sortTypes,
                'itemTypes' => $itemTypes,
            ]);
        });
    }

    private function justForYouSection()
    {
        $sortTypes = [
            'DESC' => 'Newest',
            'ASC' => 'Oldest',
        ];
        $itemTypes = [
            'GET_BY_CATEGORY' => 'Category',
            'DEFAULT' => 'Default',
        ];
        return tap(new Tab('home_just_for_you_section', 'Just For You Section'), function (Tab $tab) use($sortTypes, $itemTypes){
            $tab->weight(11);
            $tab->view('admin.anan.tabs.home.just_for_you', [
                'categories' => Category::treeList(),
                'sortTypes' => $sortTypes,
                'itemTypes' => $itemTypes,
            ]);
        });
    }

    private function newestProductSection()
    {
        $sortTypes = [
            'DESC' => 'Newest',
            'ASC' => 'Oldest',
        ];
        $itemTypes = [
            'GET_BY_CATEGORY' => 'Category',
            'DEFAULT' => 'Default',
        ];
        return tap(new Tab('home_newest_product_section', 'Newest Product Section'), function (Tab $tab) use($sortTypes, $itemTypes){
            $tab->weight(11);
            $tab->view('admin.anan.tabs.home.newest_product', [
                'categories' => Category::treeList(),
                'sortTypes' => $sortTypes,
                'itemTypes' => $itemTypes,
            ]);
        });
    }
  
  
    private function customV1Section()
    {
        $sortTypes = [
            'DESC' => 'Newest',
            'ASC' => 'Oldest',
        ];
        $itemTypes = [
            'GET_BY_CATEGORY' => 'Category',
            'DEFAULT' => 'Default',
        ];
        return tap(new Tab('home_custom_v1_section', 'Custom V1 Section'), function (Tab $tab) use($sortTypes, $itemTypes){
            $tab->weight(11);
            $tab->view('admin.anan.tabs.home.custom_v1', [
                'categories' => Category::treeList(),
                'sortTypes' => $sortTypes,
                'itemTypes' => $itemTypes,
            ]);
        });
    }


    // Home
    private function blogCategory()
    {
        return tap(new Tab('blog_category', 'Blog Category'), function (Tab $tab) {
            $tab->weight(10);
            $tab->view('admin.anan.tabs.blog', [

                'blogcategory_slider' => $this->getSliders(),

                'blogcategory_main1' => Group::all()->pluck('name','id')->prepend(trans('anan::anan.form.please_select'), ''),
                'blogcategory_main2' => Group::all()->pluck('name','id')->prepend(trans('anan::anan.form.please_select'), ''),
                'blogcategory_main3' => Group::all()->pluck('name','id')->prepend(trans('anan::anan.form.please_select'), ''),
                'blogcategory_main4' => Group::all()->pluck('name','id')->prepend(trans('anan::anan.form.please_select'), ''),

                'blogcategory_sidebar1' => Group::all()->pluck('name','id')->prepend(trans('anan::anan.form.please_select'), ''),
                'blogcategory_sidebar2' => Group::all()->pluck('name','id')->prepend(trans('anan::anan.form.please_select'), ''),
                'blogcategory_sidebar3' => Group::all()->pluck('name','id')->prepend(trans('anan::anan.form.please_select'), ''),
            ]);
        });
    }

    // General
    private function general()
    {
        return tap(new Tab('general', trans('anan::anan.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields(['anan_slider', 'anan_copyright_text']);
            $tab->view('admin.anan.tabs.general', [
                'pages' => $this->getPages(),
                'sliders' => $this->getSliders(),
                'homes' => $this->getHomes()
            ]);
        });
    }

    private function getHomes()
    {
        $homes = [];
        foreach (\File::glob(app('stylist')->current()->getPath() . '/views/public/home/*.blade.php') as $filename) {
            $name = basename($filename,'.blade.php');
            $homes[$name] = $name;
        }
        return $homes;
    }

    private function getPages()
    {
        return Page::all()->pluck('name', 'id')
            ->prepend(trans('anan::anan.form.please_select'), '');
    }

    private function getSliders()
    {
        return Slider::all()->sortBy('name')->pluck('name', 'id')
            ->prepend(trans('anan::anan.form.please_select'), '');
    }

    private function logo()
    {
        return tap(new Tab('logo', trans('anan::anan.tabs.logo')), function (Tab $tab) {
            $tab->weight(10);
            $tab->view('admin.anan.tabs.logo', [
                'favicon' => $this->getMedia(setting('anan_favicon')),
                'headerLogo' => $this->getMedia(setting('anan_header_logo')),
                'footerLogo' => $this->getMedia(setting('anan_footer_logo')),
                'mailLogo' => $this->getMedia(setting('anan_mail_logo')),
                'mobileHeaderLogo' => $this->getMedia(setting('anan_mobile_header_logo')),
            ]);
        });
    }

    private function menus()
    {
        return tap(new Tab('menus', trans('anan::anan.tabs.menus')), function (Tab $tab) {
            $tab->weight(15);

            $tab->fields([
                'anan_primary_menu',
                'anan_category_menu',
                'anan_footer_menu',
                'anan_footer_menu_title',
            ]);

            $tab->view('admin.anan.tabs.menus', [
                'menus' => $this->getMenus(),
            ]);
        });
    }

    private function getMenus()
    {
        return Menu::all()->pluck('name', 'id')
            ->prepend(trans('anan::anan.form.please_select'), '');
    }

    private function footer()
    {
        $data = [];
        for ( $i = 1; $i < 4; $i++ ) {
            $data['footerSectionOne'.$i] = $this->getMedia(setting('anan_footer_section_one_image_'.$i));
        }

        return tap(new Tab('footer', trans('anan::anan.tabs.footer')), function (Tab $tab) use($data){
            $tab->weight(5);
            $tab->view('admin.anan.tabs.footer', $data);
        });
    }

    private function newsletter()
    {
        if (! setting('newsletter_enabled')) {
            return;
        }

        return tap(new Tab('newsletter', trans('anan::anan.tabs.newsletter')), function (Tab $tab) {
            $tab->weight(18);
            $tab->view('admin.anan.tabs.newsletter', [
                'newsletterBgImage' => $this->getMedia(setting('anan_newsletter_bg_image')),
            ]);
        });
    }

    private function getMedia($fileId)
    {
        return Cache::rememberForever(md5("files.{$fileId}"), function () use ($fileId) {
            return File::findOrNew($fileId);
        });
    }

    private function features()
    {
        return tap(new Tab('features', trans('anan::anan.tabs.features')), function (Tab $tab) {
            $tab->weight(20);
            $tab->view('admin.anan.tabs.features');
        });
    }

    private function productPage()
    {
        return tap(new Tab('product_page', trans('anan::anan.tabs.product_page')), function (Tab $tab) {
            $tab->weight(22);
            $tab->view('admin.anan.tabs.product_page', [
                'banner' => Banner::getProductPageBanner(),
            ]);
        });
    }

    private function socialLinks()
    {
        return tap(new Tab('social_links', trans('anan::anan.tabs.social_links')), function (Tab $tab) {
            $tab->weight(25);

            $tab->fields([
                'anan_fb_link',
                'anan_twitter_link',
                'anan_instagram_link',
                'anan_linkedin_link',
                'anan_pinterest_link',
                'anan_gplus_link',
                'anan_youtube_link',
            ]);

            $tab->view('admin.anan.tabs.social_links');
        });
    }

}
