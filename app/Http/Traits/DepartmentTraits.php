<?php
namespace App\Http\Traits;


trait DepartmentTraits {

    public function getAllDepartments()
    {
        return $this->depModel::get();
    }

    public function getDepartmentById($depId)
    {
        return $this->depModel::findOrFail($depId);
    }
}
