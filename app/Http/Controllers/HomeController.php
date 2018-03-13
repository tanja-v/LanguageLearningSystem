<?php

namespace App\Http\Controllers;

use App\Language;
use App\Lesson;
use App\TargetLanguage;
use App\UserPoints;
use App\Word;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Debugbar;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();

        return view('home', ['languages' => $languages]);
    }

    public function startLanguage($id){

        $match = ['user_id' => Auth::user()->id, 'language_id' => $id];

        $checkTarget = TargetLanguage::where($match)->get();

        if(count($checkTarget)==0){
            $targetLanguage = new TargetLanguage();
            $targetLanguage->setAttribute('language_id', $id);
            $targetLanguage->setAttribute('user_id',  Auth::user()->id);
            $targetLanguage->save();
        }

        $lessons = Lesson::where('language_id', 'LIKE', "$id")->get();

        $lessonStatus = [];

        foreach($lessons as $lesson){
            $lessonWords = Word::where('lesson_id', 'LIKE', $lesson->id)->get();
            $numFinished = 0;
            foreach ($lessonWords as $w){
                $getPoints = ['user_id' => Auth::user()->id, 'word_id' => $w->id];
                $up = UserPoints::where($getPoints)->get()->first();

                if($up){
                    if($up->points == 10){
                        $numFinished++;
                    }
                }

            }
            if (count($lessonWords)==0){
                array_push($lessonStatus, 'not started');

                //lessons are completed when the user has 10 points for each word
            }elseif($numFinished == count($lessonWords)){
                array_push($lessonStatus, 'completed');
            }else{
                array_push($lessonStatus, 'still learning');
            }
        }

        return view('language_lessons', ['lessons' => $lessons], ['lesson_status' => $lessonStatus]);
    }

    public function showLessonProgress($id){
        $lesson = Lesson::whereKey($id)->get()->first();
        $words = Word::where('lesson_id', 'LIKE', "$id")->get();
        //get user points for each word in this lesson
        $wordPoints = [];
        foreach($words as $word){
            $match = ['user_id' => Auth::user()->id, 'word_id' => $word->id];
            $p = UserPoints::where($match)->get()->first();
            if($p){
                array_push($wordPoints, $p->points);
            }else{
                array_push($wordPoints, 0);
            }

        }

        $viewArgs = ['lesson' => $lesson, 'words' => $words];

        return view('lesson_progress', $viewArgs, ['wp' => $wordPoints]);
    }

    public function practiceLesson($id, $index=0){
        $lesson = Lesson::whereKey($id)->get()->first();

        $words = Word::where('lesson_id', 'LIKE', $lesson->id)->get();
        //checks if the lesson is over
        if(count($words) > $index){
            $word = $words[$index];
            return view('practice_lesson', ['word' => $word], ['index' => $index]);
        }else {
            return $this->showLessonProgress($lesson->id);
        }

    }

    public function checkAnswer(Request $request){
        $i = $request->input('index');
        $i++;

        $answer = $request->input('eng_word');
        $w = Word::whereKey($request->input('word_id'));
        $correctAnswer = $w->value('eng_translation');

        if(isset($_GET["btnskip"])){
            return $this->practiceLesson($w->value('lesson_id'), $i);
        }elseif (isset($_GET["btnback"])){
            $lesson = Lesson::whereKey($w->value('lesson_id'))->get()->first();
            return $this->startLanguage($lesson->value('language_id'));
        }



        $match = ['user_id' => Auth::user()->id, 'word_id' => $w->value('id')];
        $pointsSoFar = UserPoints::where($match)->get()->first();

        if(strtolower($answer) == strtolower($correctAnswer)) {
            if (!$pointsSoFar) {
                $points = new UserPoints();
                $points->setAttribute('user_id', Auth::user()->id);
                $points->setAttribute('word_id', $w->value('id'));
                $points->setAttribute('points', 1);
                $points->save();
            } else {
                if($pointsSoFar->points < 10){
                    $pointsSoFar->setAttribute('points', $pointsSoFar->points + 1);
                    $pointsSoFar->save();
                }

            }
        }else{
            if (!$pointsSoFar) {
                $points = new UserPoints();
                $points->setAttribute('user_id', Auth::user()->id);
                $points->setAttribute('word_id', $w->value('id'));
                $points->setAttribute('points', 0);
                $points->save();
            } else {
                if($pointsSoFar->points>0){
                    $pointsSoFar->setAttribute('points', $pointsSoFar->points - 1);
                    $pointsSoFar->save();
                }

            }
        }

        return $this->practiceLesson($w->value('lesson_id'), $i);
    }

}