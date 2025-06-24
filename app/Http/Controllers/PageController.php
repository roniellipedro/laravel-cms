<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::paginate(10);

        return view('admin.pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->only([
            'title',
            'body'
        ]);

        $data['slug'] = Str::slug($data['title'], '-');

        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:100'],
            'body' => ['string'],
            'slug' => ['required', 'string', 'max:100', 'unique:pages']
        ]);

        if ($validator->fails()) {
            return redirect(route('pages.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $page = new Page;
        $page->title = $data['title'];
        $page->body = $data['body'];
        $page->slug = $data['slug'];
        $page->save();

        return redirect(route('pages'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = Page::find($id);

        if ($page) {
            return view('admin.pages.edit', ['page' => $page]);
        }
        return redirect(route('pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $page = Page::find($id);

        if ($page) {
            $data = $request->only([
                'title',
                'body'
            ]);

            if ($page['title'] !== $data['title']) {
                $data['slug'] = Str::slug($data['title'], '-');

                $validator = Validator::make($data, [
                    'title' => ['required', 'string', 'max:100'],
                    'body' => ['string'],
                    'slug' => ['required', 'string', 'max:100', 'unique:pages']
                ]);
            } else {
                $validator = Validator::make($data, [
                    'title' => ['required', 'string', 'max:100'],
                    'body' => ['string']
                ]);
            }

            if ($validator->fails()) {
                return redirect(route('pages.edit', [
                    'id' => $id
                ]))
                    ->withErrors($validator)
                    ->withInput();
            }

            $page->title = $data['title'];
            $page->body = $data['body'];

            if (!empty($data['slug'])) {
                $page->slug = $data['slug'];
            }

            $page->save();

            return redirect(route('pages.edit', ['id' => $id]))
                ->with('warning', 'Informações alteradas com sucesso!');
        }

        return redirect(route('painel.users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
