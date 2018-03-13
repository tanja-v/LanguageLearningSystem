@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>{{ $language->language_name}}</h3>

                        <table class="table table-striped">
                            <thead>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>

                            @foreach($lessons as $lesson)
                                <tr>
                                    <td>{{ $lesson->lesson_number }}</td>
                                    <td>{{ $lesson->lesson_name }}</td>
                                    <td>
                                        <div class="btn-group btn-group-xs" role="group">
                                            <a href="{{ route('show_lesson_details', ['id' => $lesson->id]) }}" class="btn btn-default">Edit</a>
                                        </div>
                                        <div class="btn-group btn-group-xs" role="group">
                                            <a href="{{ route('delete_lesson', ['id' => $lesson->id]) }}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="add-lesson">
                            <form action="{{ route('add-new-lesson') }}" method="get">
                                <div class="form-group">
                                    <label>Lesson number: </label>
                                    <input type="text" id="lesson_num" name="lesson_num">
                                    <label>Lesson name:</label>
                                    <input type="text" id="lesson_name" name="lesson_name">
                                    <input type="hidden" name="language_id" value="{{ $language->id }}">
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