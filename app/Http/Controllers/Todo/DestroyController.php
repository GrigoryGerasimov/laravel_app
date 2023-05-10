<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function __invoke(Todo $todo): RedirectResponse
    {
        $todo->delete();

        return redirect()->route('todo.index');
    }
}
