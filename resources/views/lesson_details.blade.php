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
                            <th>Actions</th>
                            </thead>
                            <tbody>

                            @foreach($words as $word)
                                <tr>
                                    <td>{{ $word->word }}</td>
                                    <td>{{ $word->eng_translation }}</td>
                                    <td>
                                        <div class="btn-group btn-group-xs" role="group">
                                            <a href="{{ route('delete_word', ['id' => $word->id]) }}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                        <div class="add-word">
                            <form action="{{ route('add-new-word') }}" method="get">
                                <div class="form-group">
                                    <label>Word: </label>
                                    <input type="text" id="word" name="word">
                                    <label>Translation:</label>
                                    <input type="text" id="eng_word" name="eng_word">
                                    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                    <input type="submit" name="btnadd" id="btnadd" value="Add">
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection