<?php
namespace Themes\Anan\Http\ViewComposer;

use Themes\Anan\Banner;
use Themes\Anan\Feature;
use Modules\Brand\Entities\Brand;
use Illuminate\Support\Collection;
use Modules\Slider\Entities\Slider;
use Illuminate\Support\Facades\Cache;
use Modules\Category\Entities\Category;
use Modules\Media\Entities\File;
use Modules\Post\Entities\Post;
use Modules\Group\Entities\Group;

class BlogComposer
{
    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose($view)
    {
        $number = 6;
        $view->with([
            'blogcategory_slider' => $this->getSlider(),
            'blogcategory_sidebar1' => $this->getPostByCategory( setting('blogcategory_sidebar1') , $number ),
            'blogcategory_sidebar2' => $this->getPostByCategory( setting('blogcategory_sidebar2') , $number ),
            'blogcategory_sidebar3' => $this->getPostByCategory( setting('blogcategory_sidebar3') , $number ),
        ]);
    }

    private function getSlider()
    {
        return Slider::findWithSlides(setting('blogcategory_slider'));
    }

    private function getPostByCategory($category_id = 0, $number = 4)
    {
        if ( $category = Group::find( $category_id ) ) {
            return $category->posts()->orderBy('id','desc')->limit($number)->get();
        }
        return ;
    }

    private function getMedia($fileId)
    {
        return Cache::rememberForever(md5("files.{$fileId}"), function () use ($fileId) {
            return File::findOrNew($fileId);
        });
    }
}
