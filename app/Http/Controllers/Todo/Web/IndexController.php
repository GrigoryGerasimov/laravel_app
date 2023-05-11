<?php

namespace App\Http\Controllers\Todo\Web;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $todosList = Todo::where('done', 'false')->get();

        return view('todos.index', compact('todosList'));
    }
}
