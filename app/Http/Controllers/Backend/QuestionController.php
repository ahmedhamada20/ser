<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Quizze;
use App\Models\Type;
use Illuminate\Http\Request;
use Toastr;

class QuestionController extends Controller
{

    protected $data = [
        'folder' => 'backend.',
        'var' => 'question.',
        'Models' => 'App\Models\Question',
        'folderBlade' => 'question',
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'data' => $this->data['Models']::all(),
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
            'typs' => Type::get(),
            'quizzes' => Quizze::get(),
        ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->data['var'] = new $this->data['Models']();
        $this->data['var']->name = $request->name;
        $this->data['var']->type_id = $request->type_id;
        $this->data['var']->quizzes_id = $request->quizzes_id;
        $this->data['var']->save();
        Toastr::success('تمت الأضافة بنجاح', 'عملية ناجحة');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'data' => $this->data['Models']::findorfail(decrypt($id)),
            'typs' => Type::get(),
            'quizzes' => Quizze::get(),
        ];
        return view($this->data['folder'] . $this->data['folderBlade'] . '.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->data['var'] = $this->data['Models']::findorfail(decrypt($id));
        $this->data['var']->name = $request->name;
        $this->data['var']->type_id = $request->type_id;
        $this->data['var']->quizzes_id = $request->quizzes_id;
        $this->data['var']->update();
        Toastr::success('تم التعديل بنجاح', 'عملية ناجحة');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->data['var'] = $this->data['Models']::findorfail(decrypt($id));
        $this->data['var']->destroy(decrypt($id));
        Toastr::error('تم الحذف بنجاح', 'عملية ناجحة');
        return redirect()->back();
    }
}
