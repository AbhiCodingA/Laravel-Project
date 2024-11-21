<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function store(Request $request)
    {
        $page = new Page();
        $page->page_title = $request->page_title;
        $page->slug = Str::slug($request->page_title, '-');
        $page->page_description = $request->page_description;
        $page->page_link = $request->page_link;
        $page->page_image = $this->saveImage($request);
        $page->save();

        return redirect()->back()->with('success', 'Page Created Successfully');
    }

    private function saveImage(Request $request)
    {
        if ($request->hasFile('page_image')) {
            $image = $request->file('page_image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $directory = 'upload/pages/';
            $imageUrl = $directory . $imageName;
            $image->move($directory, $imageName);

            return $imageUrl;
        }

        return null; // Return null if no file is uploaded.
    }

    public function show()
    {
        return view('admin.pages.show', [
            'pages' => Page::latest()->get(),
        ]);
    }

    public function edit($id)
    {
        $page = Page::find($id);

        if (!$page) {
            return redirect()->back()->with('error', 'Page not found.');
        }

        return view('admin.pages.edit', [
            'page' => $page,
        ]);
    }

    public function update(Request $request)
    {
        $page = Page::find($request->id);

        if (!$page) {
            return redirect()->back()->with('error', 'Page not found.');
        }

        $page->page_title = $request->page_title;
        $page->slug = Str::slug($request->page_title, '-');
        $page->page_description = $request->page_description;
        $page->page_link = $request->page_link;

        if ($request->hasFile('page_image')) {
            if (file_exists($page->page_image)) {
                unlink($page->page_image);
            }
            $page->page_image = $this->saveImage($request);
        }

        $page->save();

        return redirect()->back()->with('success', 'Page Updated Successfully');
    }

    public function delete($id)
    {
        $page = Page::find($id);

        if (!$page) {
            return redirect()->back()->with('error', 'Page not found.');
        }

        if ($page->page_image && file_exists($page->page_image)) {
            unlink($page->page_image);
        }

        $page->delete();

        return redirect()->back()->with('success', 'Page has been deleted.');
    }
}
