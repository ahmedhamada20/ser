<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AnswerQuiz;
use App\Models\Question;
use App\Models\Quizze;
use App\Models\Setting;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index($id)
    {
        $data   =   [
            'quiz'=> Quizze::findorfail($id),
            'setting' => Setting::first(),
            'quizs' => Question::where('quizzes_id', $id)->get(),
        ];
        return view('frontend.index', $data);
    }

    public function showQuiz($name)
    {
        
        $data   =   Quizze::where('name',$name)->first();
        $setting    =   Setting::first();
        $quizs  =   Question::where('quizzes_id', $data->id)->get();
        return view('frontend.show', compact('data', 'quizs', 'setting'));
    }

    public function pages($id)
    {
        $data = [
            'data' => Question::where('quizzes_id', $id)->get()
        ];



        return view('backend.questions.index', $data);
    }

    public function store(Request $request)
    {


        foreach ($request->name as $row) {
            $data = explode('/', $row);
            AnswerQuiz::create([
                'name' => $data[0],
                'quz' => $data[1],
                'text' => $request->text,
            ]);
        }

        return redirect()->route('home');
    }
}
