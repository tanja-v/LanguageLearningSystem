@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h3>{{$lesson->lesson_number . ". " . $lesson->lesson_name}}</h3>

                        <table class="table table-striped">
                            <thead>
                            <th>Word</th>
                            <th>Translation</th>
                            <th>Points</th>
                            </thead>
                            <tbody>
                            @foreach($words as $word)
                                <tr>
                                    <td>{{ $word->word }}</td>
                                    <td>{{ $word->eng_translation }}</td>
                                    <td>{{ $wp[$loop->index] }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <div class="btn-group btn-group-xs" role="group">
                            <a href="{{ route('practice_lesson', ['id' => $lesson->id]) }}" class="btn btn-default">Practice</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection