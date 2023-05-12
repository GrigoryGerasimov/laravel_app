<?php

namespace App\Http\Controllers\Todo\Web;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Contracts\View\View;

final class EditController extends Controller
{
    public function __invoke(Todo $todo): View
    {
        return view('todos.edit', compact('todo'));
    }
}
