<?php

namespace App\Http\Controllers;

use App\Models\ArtikelsAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArtikelsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = ArtikelsAdmin::all();
        $tampil_artikel = ArtikelsAdmin::all()->count();
        return view('artikel_admin.index', compact(['artikels', 'tampil_artikel']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $file = $request->file('file_gambar');

        // $artikel_upload = $file->getClientOriginalName();

        // $file->move(public_path('file'), $artikel_upload);

        // Validator::make($request->all(), [
        //     'judul_artikel' => 'required',
        //     'konten' => 'required',
        //     'upload_gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $request->validate([
            'judul_artikel' => 'required',
            // 'slug' => 'required',
            'konten' => 'required',
            'upload_gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file = $request->file('upload_gambar');

        $imgName = $file->getClientOriginalName();

        $file->move(public_path('file'), $imgName);

        if ($request->id == null) {
            $artikels = ArtikelsAdmin::create([
                'judul_artikel' => $request->judul_artikel,
                'slug' => Str::slug($request->judul_artikel),
                'konten' => $request->konten,
                'upload_gambar' => $imgName,
            ]);
        } else {
            $artikels = ArtikelsAdmin::where('id', '=', $request->id)->update([
                'judul_artikel' => $request->judul_artikel,
                'slug' => Str::slug($request->judul_artikel),
                'konten' => $request->konten,
                'upload_gambar' => $imgName,
            ]);
        }
        return response()->json($artikels);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArtikelsAdmin  $artikelsAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(ArtikelsAdmin $artikelsAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArtikelsAdmin  $artikelsAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_artikel = ArtikelsAdmin::findOrFail($id);
        // $where = array('id' => $id);
        // $edit_artikel = ArtikelsAdmin::where($where)->first();
        return response()->json($edit_artikel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArtikelsAdmin  $artikelsAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($request, [
            'judul_artikel' => 'required',
            // 'slug' => 'required',
            'konten' => 'required',
            'upload_gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imgName = null;

        if ($request->upload_gambar) {
            $imgName = $request->upload_gambar->getClientOriginalName() . '-' . time() . '.' . $request->upload_gambar->extension();

            $request->upload_gambar->move(public_path('file'), $imgName);
        }

        ArtikelsAdmin::find($id)->update([
            'judul_artikel' => $request->judul_artikel,
            'slug' => Str::slug($request->judul_artikel),
            'konten' => $request->konten,
            'upload_gambar' => $imgName,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArtikelsAdmin  $artikelsAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ArtikelsAdmin::where('id', $id)->delete();
        return redirect('artikels/index');
    }
}
