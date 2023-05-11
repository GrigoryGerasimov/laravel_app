<?php

declare(strict_types=1);

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

abstract class Service implements ServiceInterface
{
    abstract public static function store(FormRequest $request): Model;

    abstract public static function update(Model $model, FormRequest $request): Model;

    abstract public static function restore($modelId): Model;
}
