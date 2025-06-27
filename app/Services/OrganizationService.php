<?php
namespace App\Services;

use App\Models\Organization;

class OrganizationService
{

    /**
     * Создания данных
     *
     * @param array $data
     * @return Organization
     */
    public function create(array $data): Organization
    {
        $organization = Organization::create($data);
        $organization->activities()->sync($data['activities']);
        return $organization->refresh();
    }

    /**
     * Обнолвения данных, с возможным дальнейшей адаптацией к реалям
     *
     * @param Organization $organization
     * @param array $data
     * @return Organization
     */
    public function update(Organization $organization, array $data): Organization
    {
        $organization->update($data);

        if (isset($data['activities'])) {
            $organization->activities()->sync($data['activities']);
        }

        return $organization->refresh();
    }
}
