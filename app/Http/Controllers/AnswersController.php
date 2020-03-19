<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    
    public function store(Question $question, Request $request)
    {
        

        $question->answers()->create($request->validate([
            'body'=> 'required'
        ])+['user_id' =>\Auth::id()]);
        return back()->with('success', "Your answer has been submitted successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Question $question,Answer $answer)
    {
        $this->authorize('update', $answer);

        return view('answers.edit', compact('question','answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);

        $answer->update($request->validate([
            'body' => 'required',

        ]));

        return redirect()->route('question.show', $question->slug)->with('Success',"Your answer has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question,Answer $answer)
    {
        $this->authorize('delete', $answer);

        $answer->delete();

        return back()->with('Success', "your answer has Been removed");
    }
}
