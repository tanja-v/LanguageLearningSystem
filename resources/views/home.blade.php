@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pick a language and start learning!</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                        <th>Language</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>

                        @foreach($languages as $language)
                            <tr>
                                <td>{{ $language->language_name }}</td>
                                <td>
                                    @auth
                                    <div class="btn-group btn-group-xs" role="group">
                                        <a href="{{ route('start_language', ['id' => $language->id]) }}" class="btn btn-default">Learn</a>
                                    </div>
                                    @else
                                        <p>Only for logged in users!</p>
                                    @endauth
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
