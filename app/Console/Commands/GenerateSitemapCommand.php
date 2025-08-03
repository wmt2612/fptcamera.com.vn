<?php

namespace FleetCart\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Category\Entities\Category;
use Modules\FptService\Entities\FptCategory;
use Modules\Group\Entities\Group;
use Modules\Page\Entities\Page;
use Modules\Post\Entities\Post;
use Modules\Product\Entities\Product;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemapCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap.xml file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $indexPath = public_path('sitemap.xml');
        $pagesPath = '/pages-sitemap.xml';
        $postsPath = '/posts-sitemap.xml';
        $postCategoriesPath = '/post-categories-sitemap.xml';
        $productCategoriesPath = '/product-categories-sitemap.xml';

        $sitemapIndex = SitemapIndex::create()
            ->add(Sitemap::create($pagesPath)
                ->setLastModificationDate(Carbon::now()))
            ->add(Sitemap::create($postsPath)
                ->setLastModificationDate(Carbon::now())
            )->add(Sitemap::create($postCategoriesPath)
                ->setLastModificationDate(Carbon::now())
            )
            ->add(Sitemap::create($productCategoriesPath)
                ->setLastModificationDate(Carbon::now())
            );

        // Generate pages_sitemap.xml
        $pageSitemap = \Spatie\Sitemap\Sitemap::create()
            ->add(
                Url::create(route('home'))
                    ->setLastModificationDate(Carbon::now())
                    ->setChangeFrequency('monthly')
                    ->setPriority(1.0)
            );

        $pages = Page::select('id', 'slug', 'updated_at')->get();

        foreach ($pages as $page) {
            $pageSitemap->add(
                Url::create($page->url())
                    ->setLastModificationDate($page->updated_at)
                    ->setChangeFrequency('monthly')
                    ->setPriority(0.8)
            );
        }

        $pageSitemap->writeToFile(public_path($pagesPath));

        // Generate posts_sitemap.xml
        $posts = Post::select('id', 'slug', 'updated_at')->get();
        $postSitemap = \Spatie\Sitemap\Sitemap::create();

        foreach ($posts as $post) {
            $postSitemap
                ->add(
                    Url::create($post->url())
                        ->setLastModificationDate($post->updated_at)->setChangeFrequency('monthly')
                        ->setPriority(0.8)
                );
        }
        $postSitemap->writeToFile(public_path($postsPath));

        // Generate post-categories-sitemap.xml
        $postCategorySitemap = \Spatie\Sitemap\Sitemap::create();
        $groups = Group::select('id', 'slug', 'updated_at')->get();

        $postCategorySitemap
            ->add(
                Url::create(route('blog.index'))
                    ->setLastModificationDate(Carbon::now())
                    ->setChangeFrequency('monthly')
                    ->setPriority(0.8)
            );

        foreach ($groups as $group) {
            $postCategorySitemap
                ->add(
                    Url::create($group->url())
                        ->setLastModificationDate($group->updated_at)
                        ->setChangeFrequency('monthly')
                        ->setPriority(0.8)
                );
        }
        $postCategorySitemap->writeToFile(public_path($postCategoriesPath));

        // Generate products-sitemap.xml
        $page = 1;
        $limit = 5000;

        do {
            $products = Product::select('id', 'slug', 'updated_at')
                ->skip(($page - 1) * $limit)
                ->take($limit)
                ->get();

            if ($products->isEmpty()) {
                break;
            }

            $sitemap = \Spatie\Sitemap\Sitemap::create();

            foreach ($products as $product) {
                $sitemap->add(
                    Url::create($product->url())
                        ->setLastModificationDate($product->updated_at)
                        ->setPriority(0.7)
                        ->setChangeFrequency('weekly')
                );
            }

            $fileName = "products-sitemap-{$page}.xml";
            $sitemap->writeToFile(public_path($fileName));

            // Thêm vào sitemap index
            $sitemapIndex->add(
                Sitemap::create("/$fileName")->setLastModificationDate(now())
            );

            $page++;
        } while (true);


        // Generate product-categories-sitemap.xml
        $productCategoriesSitemap = \Spatie\Sitemap\Sitemap::create();
        $categories = Category::select('id', 'slug', 'updated_at')->get();

        foreach ($categories as $category) {
            $productCategoriesSitemap
                ->add(
                    Url::create($category->url())
                        ->setLastModificationDate($category->updated_at)
                        ->setChangeFrequency('monthly')
                        ->setPriority(0.8)
                );
        }

        $productCategoriesSitemap->writeToFile(public_path($productCategoriesPath));

        $sitemapIndex->writeToFile($indexPath);

        $this->info('Sitemap generated successfully.');
    }
}
