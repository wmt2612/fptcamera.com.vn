<?php
namespace Themes\Anan\Http\ViewComposer;

use Mexitek\PHPColors\Color;
use Modules\Compare\Compare;
use Spatie\SchemaOrg\Schema;
use Modules\Tag\Entities\Tag;
use Modules\Cart\Facades\Cart;
use Modules\Menu\Entities\Menu;
use Modules\Page\Entities\Page;
use Modules\Media\Entities\File;
use Modules\Menu\MegaMenu\MegaMenu;
use Illuminate\Support\Facades\Cache;
use Modules\Attribute\Entities\Attribute;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\SearchTerm;

class LayoutComposer
{
    /**
     * @var \Modules\Compare\Compare
     */
    private $compare;

    /**
     * Create a new view composer instance.
     *
     * @param \Modules\Compare\Compare $compare
     */
    public function __construct(Compare $compare)
    {
        $this->compare = $compare;
    }

    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose($view)
    {
        $view->with([
            'homecate' => $this->getHomeCate(),
            'vmenu' => $this->getVerticalMenu(),
            'attributes' => $this->getAttributes(),
            'primaryMenu' => $this->getPrimaryMenu(),
            'leftSideTopMenu' => $this->getLeftSideTopMenu(),
            'rightSideTopMenu' => $this->getRightSideTopMenu(),
            'newTopMenu' => $this->getNewTopMenu(),
            'saleOffProducts' => $this->getSaleOffProducts(),
        ]);
    }
    
    private function getBrands()
    {

        $brands = Brand::all();
        // dd( $brands );
        return $brands;
    }

    private function getAttributes()
    {

        $attributes = Attribute::all();
        // dd( $attributes );
        return $attributes;
    }

    private function getFavicon()
    {
        return $this->getMedia(setting('storefront_favicon'))->path;
    }

    private function getHeaderLogo()
    {
        return $this->getMedia(setting('storefront_header_logo'))->path;
    }

    private function getNewsletterBgImage()
    {
        return $this->getMedia(setting('storefront_newsletter_bg_image'))->path;
    }

    private function getMedia($fileId)
    {
        return Cache::rememberForever(md5("files.{$fileId}"), function () use ($fileId) {
            return File::findOrNew($fileId);
        });
    }

    private function getHomeCate()
    {
        return new MegaMenu(3);
    }
  
    private function getLeftSideTopMenu()
    {
        return new MegaMenu(5);
    }

    private function getRightSideTopMenu()
    {
        return new MegaMenu(6);
    }

    private function getNewTopMenu()
    {
        return new MegaMenu(setting('home_v2_top_menu'));
    }

    private function getVerticalMenu()
    {
        return new MegaMenu(2);
    }
  
    private function getPrimaryMenu()
    {
        return new MegaMenu(1);
    }
  
    private function getCategoryMenu()
    {
        return new MegaMenu(setting('storefront_category_menu'));
    }

    private function getFooterMenuOne()
    {
        return $this->getFooterMenu(setting('storefront_footer_menu_one'));
    }

    private function getFooterMenuTwo()
    {
        return $this->getFooterMenu(setting('storefront_footer_menu_two'));
    }

    private function getFooterMenu($menuId)
    {
        return Cache::tags(['menu_items', 'categories', 'pages', 'settings'])
            ->rememberForever(md5("storefront_footer_menu.{$menuId}:" . locale()), function () use ($menuId) {
                return Menu::for($menuId);
            });
    }

    private function getSaleOffProducts()
    {
        $products = [];

        for ($i = 1; $i <= 10; $i++) {
           if (!empty(setting("sale_off_popup_product_{$i}_name"))) {
               $products[] = [
                   'name' => setting("sale_off_popup_product_{$i}_name"),
                   'desc' => setting("sale_off_popup_product_{$i}_desc"),
                   'url' => setting("sale_off_popup_product_{$i}_url"),
                   'is_hot' => setting("sale_off_popup_product_{$i}_is_hot"),
                   'image' => $this->getMedia(setting("sale_off_popup_product_{$i}_image")),
               ];
           }
        }

        return $products;
    }
}
