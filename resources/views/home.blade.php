@extends('app')

@section('content')
    <div class="row m-3">
        <div class="col-md-8">
            <label for="jokes">Jokes</label>
            <select class="form-control" id="jokes" name="jokes" size="10">
                @foreach($jokes as $joke)
                    <option value="{!! $joke['id'] !!}">{!! $joke['value'] !!}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row m-3">
        <div class="col-md-8">
            <button class="btn btn-success">Move to favorites</button>
            <button class="btn btn-danger">Remove from favorites</button>
        </div>
    </div>

    <div class="row m-3">
        <div class="col-md-8">
            <div class="form-group">
                <label for="favorites">Favorites jokes</label>
                <select class="form-control" id="favorites" name="favorites" size="5">
                </select>
            </div>
        </div>
    </div>
    @endsection
