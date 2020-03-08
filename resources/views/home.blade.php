@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="row m-3">
                <div class="col-md-12">
                    <label for="jokes">Jokes</label>
                    <select class="form-control" id="jokes" name="jokes" size="10" multiple>
                        @foreach($jokes as $joke)
                            <option value="{!! $joke['id'] !!}">{!! $joke['value'] !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row m-5">
                <div class="col-md-12">
                    <button class="btn btn-info" id="add" name="add">
                        Add to favorites
                    </button>
                    <button class="btn btn-danger" id="remove" name="remove">
                        Remove from favorites
                    </button>
                </div>
            </div>

            <div class="row m-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="favorites">Favorite jokes</label>
                        <select class="form-control" id="favorites" name="favorites" size="5" multiple>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">Save!</div>
    </div>
    @endsection

@section('extra-js')
    <script src="{!! asset('assets/js/home.js') !!}"></script>
    @endsection
