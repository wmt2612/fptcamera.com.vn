<?php

namespace Modules\Option\Listeners;

class SaveServiceOptions
{
    /**
     * Handle the event.
     *
     * @param \Modules\Product\Entities\Product $product
     * @return void
     */
    public function handle($service)
    {
        $ids = $this->getDeleteCandidates($service);

        if ($ids->isNotEmpty()) {
            $service->options()->detach($ids);
        }

        $this->saveOptions($service);
    }

    private function getDeleteCandidates($service)
    {
        return $service->options()
            ->pluck('id')
            ->diff(array_pluck($this->options(), 'id'));
    }

    private function saveOptions($service)
    {
        foreach (array_reset_index($this->options()) as $index => $attributes) {
            $attributes += ['is_global' => false, 'position' => $index];

            $option = $service->options()->updateOrCreate(['id' => $attributes['id'] ?? null], $attributes);

            $option->saveValues($attributes['values'] ?? []);
        }
    }

    private function options()
    {
        return array_filter(request('options', []), function ($option) {
            return !is_null($option['name']);
        });
    }
}
