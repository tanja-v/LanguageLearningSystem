@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <h3>Administracija</h3>
                    <hr>

                    <form action="{{ route('add_language') }}" method="GET">
                        Dodaj novi jezik:
                        <input type="text" id="language" name="language">
                        <button>Add</button>
                    </form>

                    <table class="table table-striped">
                        <thead>
                        <th>ID</th>
                        <th>Language</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>

                        @foreach($languages as $language)
                            <tr>
                                <td>{{ $language->id }}</td>
                                <td>{{ $language->language_name }}</td>
                                <td>
                                    <div class="btn-group btn-group-xs" role="group">
                                        <a href="{{ route('delete_language', ['id' => $language->id]) }}" class="btn btn-danger">Delete</a>
                                        <a href="{{ route('show_lessons', ['id' => $language->id]) }}" class="btn btn-default">Lessons</a>
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
