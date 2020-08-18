<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Policies\AnswerPolicy;
class AcceptAnswerController extends Controller
{
    public function __invoke(Answer $answer)
    {
        //dd('Accept the answer');
        $this->authorize('accept', $answer);
        $answer->question->acceptBestAnswer($answer);
        return redirect()->back();
    }
}
