<?php

declare(strict_types=1);

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

interface ServiceInterface
{
    public static function store(FormRequest $request): Model;

    public static function update(Model $model, FormRequest $request): Model;
}
