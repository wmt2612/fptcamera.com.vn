<?php

namespace Themes\Anan\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveAnanRequest extends Request
{
    /**
    * Array of attributes that should be merged with null
    * if attribute is not found in the current request.
    *
    * @var array
    */

    private $shouldCheck = [
        'anan_footer_tags',
        'anan_featured_categories_section_category_1_products',
        'anan_featured_categories_section_category_2_products',
        'anan_featured_categories_section_category_3_products',
        'anan_featured_categories_section_category_4_products',
        'anan_featured_categories_section_category_5_products',
        'anan_featured_categories_section_category_6_products',
        'anan_product_tabs_1_section_tab_1_products',
        'anan_product_tabs_1_section_tab_2_products',
        'anan_product_tabs_1_section_tab_3_products',
        'anan_product_tabs_1_section_tab_4_products',
        'anan_top_brands',
        'anan_vertical_products_1_products',
        'anan_vertical_products_2_products',
        'anan_vertical_products_3_products',
        'anan_product_grid_section_tab_1_products',
        'anan_product_grid_section_tab_2_products',
        'anan_product_grid_section_tab_3_products',
        'anan_product_grid_section_tab_4_products',
        'anan_product_tabs_2_section_tab_1_products',
        'anan_product_tabs_2_section_tab_2_products',
        'anan_product_tabs_2_section_tab_3_products',
        'anan_product_tabs_2_section_tab_4_products',    
    ];

    /**
    * Get data to be validated from the request.
    *
    * @return array
    */
    public function validationData()
    {
        foreach ($this->shouldCheck as $attribute) {
            if (! $this->has($attribute)) {
                $this->merge([$attribute => null]);
            }
        }

        return $this->all();
    }
}