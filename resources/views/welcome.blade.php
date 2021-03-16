@extends('layouts.app')
@section('content')
    <div class="container bg-transparent mt-4">
        <div class="card shadow-lg">
            <table class="table table-dark table-striped table-hover is-datatable">
                <thead>
                <tr>
                    <th scope="col">Routes</th>
                </tr>
                </thead>
                <tbody>
                @foreach(app('router')->getRoutes() as $route)
                    @if($route->getName() && $route->methods()[0]=='GET' && !str_starts_with((string) $route->getName(), 'ignition.'))
                        <tr>
                            <td>
                                <a href="{{ route($route->getName()) }}" class="text-info">
                                    {{ $route->getName() }}
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
