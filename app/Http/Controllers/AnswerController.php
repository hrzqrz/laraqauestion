<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Auth;
use Illuminate\Http\Request;
use App\Policies\AnswerPolicy;
class AnswerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $question->answers()->create(['body' => $request->body, 'user_id'=> \Auth::id()]);

        return redirect()->back()->with('answer_sent_success', 'پاسخ شما با موفقیت ارسال شد.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);
        return view('answers.edit')->with(['question'=>$question, 'answer'=>$answer]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);
        $answer->update($request->validate([
            'body'=>'required'
        ]));

        if($request->expectsJson())
        {
            return response()->json([
                'message' => 'اطلاعات با موفقیت بروزرسانی شد.',
                'body_html'  => $answer->body_html
            ]);
        }
        return redirect()->route('questions.show', $question->slug)->with('answer_updated_success', 'اطلاعات با موفقیت به روزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Answer $answer)
    {
        $this->authorize('delete', $answer);
        $answer->delete();
        return redirect()->back()->with('answer_delete_succss', 'این پاسخ با موفقیت حذف شد.');
    }
}
