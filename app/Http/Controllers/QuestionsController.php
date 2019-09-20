<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Question;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    
    class QuestionsController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
            $questions = Question::with('user')->latest()->paginate(5);
            return view('questions.index', compact('questions'));
        }
        
        /**
         * Show the form for creating a new resource.
         *
         * @return Response
         */
        public function create()
        {
            //
        }
        
        /**
         * Store a newly created resource in storage.
         *
         * @param Request $request
         * @return Response
         */
        public function store(Request $request)
        {
            //
        }
        
        /**
         * Display the specified resource.
         *
         * @param Question $question
         * @return Response
         */
        public function show(Question $question)
        {
            //
        }
        
        /**
         * Show the form for editing the specified resource.
         *
         * @param Question $question
         * @return Response
         */
        public function edit(Question $question)
        {
            //
        }
        
        /**
         * Update the specified resource in storage.
         *
         * @param Request $request
         * @param Question $question
         * @return Response
         */
        public function update(Request $request, Question $question)
        {
            //
        }
        
        /**
         * Remove the specified resource from storage.
         *
         * @param Question $question
         * @return Response
         */
        public function destroy(Question $question)
        {
            //
        }
    }
