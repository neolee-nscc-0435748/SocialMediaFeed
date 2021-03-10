<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use DB;

class ThemeController extends Controller
{
    /**
     * Set the middleware for permissions.
     */
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $themes = Theme::orderBy('id','DESC')->paginate(5);

        return view('themes.index',compact('themes'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('themes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:themes,name',
            'cdn_url' => 'required',
        ]);

        $theme = Theme::create([
            'name' => $request->input('name'),
            'cdn_url' => $request->input('cdn_url')
        ]);

        return redirect()->route('themes.index')
            ->with('success','Theme created successfully');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theme = Theme::find($id);

        return view('themes.show',compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theme = Theme::find($id);

        return view('themes.edit',compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'cdn_url' => 'required',
        ]);

        $theme = Theme::find($id);
        $theme->name = $request->input('name');
        $theme->cdn_url = $request->input('cdn_url');
        $theme->save();

        return redirect()->route('themes.index')
            ->with('success','Theme updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Theme::find($id)->delete();

        return redirect()->route('themes.index')
            ->with('success','Theme deleted successfully');
    }
}
