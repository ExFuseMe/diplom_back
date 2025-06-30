<?php

namespace App\Repositories;

abstract class CoreRepository
{
    protected mixed $model;

    public function __construct(){
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass(): string;

    public function startConditions()
    {
        return clone $this->model;
    }
}
