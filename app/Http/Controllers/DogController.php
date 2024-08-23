<?php

namespace App\Http\Controllers;

use App\Enums\Breed;
use App\Models\Dog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DogController extends Controller
{
    public function index(Request $request): View
    {
        $dogs = $request->user()->dogs()->latest()->get();

        return view('dogs.index', ['dogs' => $dogs]);
    }

    public function create(): View
    {
        return view('dogs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'breed' => ['required', Rule::in(Breed::values())],
            'birth_year' => ['required', 'numeric'],
        ]);

        $request->user()->dogs()->create($validatedData);

        return redirect(route('dogs.index'));
    }

    public function edit(Dog $dog): View
    {
        return view('dogs.edit', ['dog' => $dog]);
    }

    public function update(Request $request, Dog $dog): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'breed' => ['required', Rule::in(Breed::values())],
            'birth_year' => ['required', 'numeric'],
        ]);

        $dog->update($validatedData);

        return redirect(route('dogs.index'));
    }

    public function destroy(Dog $dog): RedirectResponse
    {
        $dog->delete();

        return redirect(route('dogs.index'));
    }
}
