<?php

namespace App\Services;

use App\Models\Building;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class BuildingSearchService
{

    /**
     * Получения организаций в радиусе
     *
     * @param float $lat
     * @param float $lng
     * @param float $radius
     * @return mixed
     */
    public function findByRadius(float $lat, float $lng, float $radius)
    {
        $rawHaversine = '(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) as distance';

        return Building::select('id', DB::raw($rawHaversine))
            ->addBinding([$lat, $lng, $lat], 'select')
            ->having('distance', '<=', $radius)
            ->get();
    }

    /**
     * Получения оргазинаций в определенном прямоугольнике
     *
     * @param float $lat
     * @param float $lng
     * @param float $radiusX
     * @param float $radiusY
     * @return mixed
     */
    public function findByRectangle(float $lat, float $lng, float $radiusX, float $radiusY)
    {
        $latDist = $radiusX / 111.0;
        $lngDist = $radiusY / (111.0 * deg2rad($lat));

        return Building::whereBetween('latitude', [$lat - $latDist, $lat + $latDist])
            ->whereBetween('longitude', [$lng - $lngDist, $lng + $lngDist])
            ->get();
    }

    /**
     * Обновления данных
     * Для дальнейшей адаптации к реалям, возможности сброса кэша
     *
     * @param Building $building
     * @param array $data
     * @return Building
     */
    public function update(Building $building, array $data): Building
    {
        $building->update($data);

        return $building->refresh();
    }
}
