<?php

namespace App\Http\Controllers\Todo\Web;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $todosList = auth()->user()->todos->where('done', false);

        return view('todos.index', compact('todosList'));
    }
}
