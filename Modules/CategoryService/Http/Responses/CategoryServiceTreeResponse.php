<?php

namespace Modules\CategoryService\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class CategoryServiceTreeResponse implements Responsable
{
    /**
     * Groups collection.
     *
     * @var \Illuminate\Database\Eloquent\Collection
     */
    private $category_services;

    /**
     * Create a new instance.
     *
     * @param \Illuminate\Database\Eloquent\Collection $groups
     */
    public function __construct($category_services)
    {
        $this->category_services = $category_services;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return response()->json($this->transform());
    }

    /**
     * Transform the groups.
     *
     * @return \Illuminate\Support\Collection
     */
    private function transform()
    {
        return $this->category_services->map(function ($category_service) {
            return [
                'id' => $category_service->id,
                'parent' => $category_service->parent_id ?: '#',
                'text' => $category_service->name,
                'data' => [
                    'position' => $category_service->position,
                ],
            ];
        });
    }
}
