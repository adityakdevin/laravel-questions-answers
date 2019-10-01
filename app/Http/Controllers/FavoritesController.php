<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Question;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    
    class FavoritesController extends Controller
    {
        /**
         * FavoritesController constructor.
         */
        public function __construct()
        {
            $this->middleware('auth');
        }
        
        /**
         * @param Question $question
         * @param Request $request
         * @return RedirectResponse
         */
        public function store(Question $question, Request $request)
        {
            $question->favorites()->attach(auth()->id());
            return back();
        }
        
        /**
         * @param Question $question
         * @return RedirectResponse
         */
        public function destroy(Question $question)
        {
            $question->favorites()->detach(auth()->id());
            return back();
        }
    }
