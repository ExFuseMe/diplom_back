<?php

namespace App\Repositories;

abstract class BasicRepository
{
    private mixed $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

     abstract public function getModelClass();

    public function startConditions()
    {
        return clone $this->model;
    }
}
