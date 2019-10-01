<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AcceptAnswersController extends Controller
{
    public function __invoke(Answer $answer)
    {
        // TODO: Implement __invoke() method.
        $this->authorize('accept',$answer);
        $answer->question->acceptBestAnswer($answer);
        return back();
    }
}
