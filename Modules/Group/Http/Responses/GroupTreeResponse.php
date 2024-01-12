<?php

namespace Modules\Group\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class GroupTreeResponse implements Responsable
{
    /**
     * Groups collection.
     *
     * @var \Illuminate\Database\Eloquent\Collection
     */
    private $groups;

    /**
     * Create a new instance.
     *
     * @param \Illuminate\Database\Eloquent\Collection $groups
     */
    public function __construct($groups)
    {
        $this->groups = $groups;
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
        return $this->groups->map(function ($group) {
            return [
                'id' => $group->id,
                'parent' => $group->parent_id ?: '#',
                'text' => $group->name,
                'data' => [
                    'position' => $group->position,
                ],
            ];
        });
    }
}
