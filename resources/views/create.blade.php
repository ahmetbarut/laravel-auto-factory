@extends('ahmetbarut-laravel-auto-factory::layout')
@section('content')
    <div class="row p-2 border justify-content-center">
        <div class="col-8">
            <h6>
                {{ $table }}
            </h6>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Column Name</td>
                        <td>Column Type</td>
                        <td>Column Faker Method</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($columns as $column)
                        <tr>
                            <td>
                                {{ $column['name'] }}
                            </td>
                            <td>
                                {{ $column['type'] }}
                            </td>
                            <td>
                                {{ $column['faker'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{ route('laravel-auto-factory.tables.store', ['table' => $table]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="number">Number of rows</label>
                    <input type="number" class="form-control" id="number" name="rows" value="10">
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Generate</button>
                </div>
            </form>
        </div>
    </div>
@endsection
