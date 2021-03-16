@extends('layouts.app')
@section('content')
    <div class="container bg-transparent">
        <div class="card shadow-lg">
            <table class="table table-dark table-striped table-hover is-datatable">
                <thead>
                <tr>
                    @foreach($headings as $heading)
                        <th scope="col">{{ $heading }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        @foreach($cols as $col)
                            <td>{{ $item[$col] }}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
