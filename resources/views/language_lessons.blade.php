@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                    <table class="table table-striped">
                        <thead>
                        <th>Number</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>

                        @foreach($lessons as $lesson)
                            <tr>
                                <td>{{ $lesson->lesson_number }}</td>
                                <td>{{ $lesson->lesson_name }}</td>
                                <td>{{ $lesson_status[$loop->index] }}</td>
                                <td>
                                    <div class="btn-group btn-group-xs" role="group">
                                        <a href="{{ route('show_lesson', ['id' => $lesson->id]) }}" class="btn btn-default">Details</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection