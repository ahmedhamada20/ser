<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Toastr;
class SettingController extends Controller
{

    protected $data = [
                 'folder' => 'backend.',
                 'var' => 'setting.',
                 'Models' => 'App\Models\Setting',
                 'folderBlade' => 'setting',
             ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
             'data' => $this->data['Models']::first(),
         ];
         return view($this->data['folder'] . $this->data['folderBlade'] . '.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [

                ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->data['var'] = new $this->data['Models']();

        $this->data['var']->save();
        Toastr::success('تمت الأضافة بنجاح', 'عملية ناجحة');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
                  'data' => $this->data['Models']::findorfail(decrypt($id)),
                 ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
                  'data' => $this->data['Models']::findorfail(decrypt($id)),
                 ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.edit', $data);
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
        $this->data['var']=$this->data['Models']::findorfail(decrypt($id));
        if ($request->hasfile('logo')) {
            $file = $request->logo;
            $filename = time() . $file->getClientOriginalname();
            $file->move('upload/setting', $filename);
            $this->data['var']->logo = $filename;
        }
        if ($request->hasfile('fave')) {
            $file = $request->fave;
            $filename = time() . $file->getClientOriginalname();
            $file->move('upload/setting', $filename);
            $this->data['var']->fave = $filename;
        }
        if ($request->hasfile('background')) {
            $file = $request->background;
            $filename = time() . $file->getClientOriginalname();
            $file->move('upload/setting', $filename);
            $this->data['var']->background = $filename;
        }
        $this->data['var']->name    =$request->name;
        $this->data['var']->update();
        Toastr::success('تم التعديل بنجاح', 'عملية ناجحة');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->data['var']=$this->data['Models']::findorfail(decrypt($id));
        $this->data['var']->destroy(decrypt($id));
        Toastr::error('تم الحذف بنجاح', 'عملية ناجحة');
        return redirect()->back();
    }
}
