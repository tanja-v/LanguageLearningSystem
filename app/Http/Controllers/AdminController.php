<?php
/**
 * Created by PhpStorm.
 * User: amd
 * Date: 25.2.2018.
 * Time: 12:59
 */

namespace App\Http\Controllers;

use App\Language;
use App\Lesson;
use App\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin', ['languages' => $languages]);
    }

    public function addNewLanguage(Request $request)
    {
        $language = new Language();
        $language->language_name = $request->input('language');
        $language->save();

        return redirect()->back();
    }

    public function deleteLanguage($id)
    {
        $language = Language::whereKey($id);
        try {
            $language->delete();
        } catch (\Exception $e) {
        }

        return redirect()->back();
    }

    public function showLessons($id){
        $language = Language::whereKey($id)->get()->first();

        $lessons = Lesson::where('language_id', 'LIKE', "$id")->get();

        return view('lessons_list', ['language' => $language], ['lessons' => $lessons]);
    }

    public function addNewLesson(Request $request)
    {
        $lesson = new Lesson();
        $lesson->lesson_number = $request->input('lesson_num');
        $lesson->lesson_name = $request->input('lesson_name');
        $lesson->language_id = $request->input('language_id');
        $lesson->save();
        return redirect()->back();
    }

    public function showLessonDetails($id){
        $lesson = Lesson::whereKey($id)->get()->first();

        $words = Word::where('lesson_id', 'LIKE', "$id")->get();

        return view('lesson_details', ['lesson' => $lesson], ['words' => $words]);
    }

    public function addNewWord(Request $request){
        $word = new Word();
        $word->word = $request->input('word');
        $word->eng_translation = $request->input('eng_word');
        $word->lesson_id = $request->input('lesson_id');

        $lesson = Lesson::whereKey($word->lesson_id)->get()->first();
        $lang_id = $lesson->language_id;

        $word->language_id = $lang_id;

        $word->save();

        return redirect()->back();
    }

    public function deleteWord($id)
    {
        $word = Word::whereKey($id);
        try {
            $word->delete();
        } catch (\Exception $e) {
        }

        return redirect()->back();
    }

    public function deleteLesson($id)
    {
        $lesson = Lesson::whereKey($id);
        try {
            $lesson->delete();
        } catch (\Exception $e) {
        }

        return redirect()->back();
    }



}