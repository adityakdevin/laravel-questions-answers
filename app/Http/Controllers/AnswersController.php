<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param Question $question
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Question $question, Request $request)
    {
        $question->answers()->create($request->validate([
            'body'=>'required'
        ]) + ['user_id'=>Auth::id()]);
        return back()->with('success','Your Answer has been submitted successfully.');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @param Answer $answer
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(Question $question, Answer $answer)
    {
        $this->authorize('update',$answer);
        return view('answers.edit',compact('question','answer'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Question $question
     * @param Answer $answer
     * @return Response
     * @throws AuthorizationException
     */
    public function update(Request $request, Question $question, Answer $answer)
    {
        $this->authorize('update',$answer);
        $answer->update($request->validate([
            'body'=>'required'
        ]));
        return redirect()->route('questions.show',$question->slug)->with('success','Your answer has been updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @param Answer $answer
     * @return void
     * @throws AuthorizationException
     */
    public function destroy(Question $question,Answer $answer)
    {
        $this->authorize('delete',$answer);
        $answer->delete();
        return back()->with('success','Your Answer has been removed.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param Answer $answer
     * @return void
     */
    public function accept(Answer $answer)
    {
        return back()->with('success','Your Answer has been accepted.');
    }
    
}
