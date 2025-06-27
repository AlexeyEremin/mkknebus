<?php
namespace App\Services;

use App\Models\Activity;
use Illuminate\Support\Facades\Cache;

class ActivityService
{

    /**
     * Получения вложенности деятельностей с кэшированием
     *
     * @param Activity $activity
     * @return mixed
     */
    public function getActivityWithDescendants(Activity $activity)
    {
        return Cache::remember("activity_tree_{$activity->id}", 3600, function () use ($activity) {
            $ids = array_merge([$activity->id], $activity->getIdsNesting());
            return Activity::with('organizations')
                ->without('parent')
                ->whereIn('id', $ids)
                ->get();
        });
    }

    /**
     * Обновления со сбросом кэша
     *
     * @param Activity $activity
     * @param array $data
     * @return Activity
     */
    public function update(Activity $activity, array $data): Activity
    {
        $activity->update($data);

        Cache::forget("activity_tree_{$activity->id}");

        return $activity->refresh();
    }
}
