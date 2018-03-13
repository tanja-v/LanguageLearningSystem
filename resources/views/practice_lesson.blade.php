@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h3>{{ $word->word }}</h3>

                        <form action="{{ route('check_answer', ['word' => $word]) }}" method="get">

                            <label>Translation:</label>
                            <input type="text" id="eng_word" name="eng_word">
                            <input type="hidden" id="word_id" name="word_id" value="{{ $word->id }}">
                            <input type="hidden" id="index" name="index" value="{{ $index }}">
                            <input type="submit" name="btnadd" id="btnadd" value="Check">
                            <input type="submit" name="btnskip" id="btnskip" value="Skip">
                            <input type="submit" name="btnback" id="btnback" value="Back to lessons">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection