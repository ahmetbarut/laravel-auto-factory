@extends('ahmetbarut-laravel-auto-factory::layout')
@section('content')
    <div class="row p-2 border justify-content-center">
        <div class="col-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Table Name</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $table)
                        <tr>
                            <td>
                                <a href="{{ route('laravel-auto-factory.tables.show', ['table' => $table->{"Tables_in_$dbName"}]) }}">{{ $table->{"Tables_in_$dbName"} }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
