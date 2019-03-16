<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionsOption; 
use App\Question; 
class QuestionsOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $questions_options = QuestionsOption::all();
        return view('questions_options.index', compact('questions_options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $relations = [
        //     'questions' => \App\Question::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        // ];
        $questions = Question::all();
        return view('questions_options.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        QuestionsOption::create($request->all());
        return redirect()->route('questions_options.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $relations = [
        //     'questions' => \App\Question::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        // ];
        $questions = Question::all();
        $questions_option = QuestionsOption::findOrFail($id);
        return view('questions_options.edit', compact('questions_option','questions') );
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
        $questionsoption = QuestionsOption::findOrFail($id);
        $questionsoption->update($request->all());
        return redirect()->route('questions_options.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionsoption = QuestionsOption::findOrFail($id);
        $questionsoption->delete();
        return redirect()->route('questions_options.index');
    }
}
