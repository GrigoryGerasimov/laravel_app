<?php

namespace App\Http\Controllers\Todo\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class CreateController extends Controller
{
    public function __invoke(): View
    {
        return view('todos.create');
    }
}
