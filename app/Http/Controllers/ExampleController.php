<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ExampleController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $examples = Example::all()->sortBy('code');
        return view('index', ['examples' => $examples]);
    }

    /**
     * @param Example $example
     * @return Application|Factory|View
     */
    public function show(Example $example)
    {
        return view('show', ['example' => $example]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'code' => 'required|unique:examples|max:50',
                'description' => 'required|max:255',
            ]);

            Example::create([
                'code' => $validated['code'],
                'description' => $validated['description'],
            ]);

        } catch (\Exception $exception) {
            Log::info('Error creating new example', ['Exception' => $exception->getMessage()]);
        }

        $examples = Example::all()->sortBy('code');
        return view('index', ['examples' => $examples]);
    }

    /**
     * @param Request $request
     * @param Example $example
     * @return Application|Factory|View
     */
    public function update(Request $request, Example $example)
    {
        try {
            $validated = $request->validate([
                'code' => 'required|unique:examples|max:50',
                'description' => 'required|max:255',
            ]);

            $example->code = $validated['code'];
            $example->description = $validated['description'];
            $example->save();

        } catch (\Exception $exception) {
            Log::info('Error creating new example', ['Exception' => $exception->getMessage()]);
        }

        $examples = Example::all()->sortBy('code');
        return view('index', ['examples' => $examples]);
    }

    public function addNumbers()
    {
        return view('numbers');
    }

    public function processNumbers(Request $request)
    {
        $answer = null;

        try {
            $validated = $request->validate([
                'number_1' => 'required|numeric|max:255',
                'number_2' => 'required|numeric|max:255',
            ]);

            $answer = (float) ($validated['number_1'] + $validated['number_2']);
        } catch (\Exception $exception) {
            Log::info('Error adding numbers', ['Exception' => $exception->getMessage()]);
        }

        return view('numbers', ['answer' => $answer]);
    }
}
