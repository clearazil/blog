<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.category.index', [
            'categories' => $categories,
        ]);
    }

    public function show(Category $category)
    {
        return view('admin.category.show', [
            'category' => $category,
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // R: netjes dat je de validation in een aparte functie hebt ondergebracht. Je kunt dit nog verder doorvoeren
        // door gebruik te maken van Request validation: https://laravel.com/docs/8.x/validation#form-request-validation
        $data = $this->validateCategory($request);

        $category = new Category($data);
        $category->save();

        return redirect(route('admin.category.show', ['category' => $category->id]));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $data = $this->validateCategory($request);

        $category->fill($data);
        $category->save();

        return redirect(route('admin.category.show', ['category' => $category->id]));
    }

    public function delete(Category $category, Request $request)
    {
        if ($category->delete()) {
            $messageStatus = 'success';
            $request->session()->flash('message', 'Categorie verwijderd.');
        } else {
            $messageStatus = 'error';
            $request->session()->flash('message', 'Er is een fout opgetreden bij het verwijderen van deze categorie.');
        }

        $request->session()->flash('message-status', $messageStatus);

        return redirect(route('admin.category.index'));
    }

    public function validateCategory(Request $request)
    {
        return $request->validate([
            'name' => 'required',
        ]);
    }
}
