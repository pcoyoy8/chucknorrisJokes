@extends('app')

@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
{{--            List of all jokes--}}
            <div class="row m-3">
                <div class="col-md-12">
                    <label for="jokes" class="display-4">Jokes</label>
                    <select class="form-control" id="jokes" name="jokes" size="10" multiple>
                        @foreach($jokes as $joke)
                            <option value="{!! $joke['id'] !!}">{!! $joke['value'] !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>

{{--            Joke buttons--}}
            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-success mr-3 mb-3" id="add" name="add">
                        Add to favorites
                    </button>
                    <button class="btn btn-danger mb-3" id="remove" name="remove">
                        Remove from favorites
                    </button>
                </div>
            </div>

{{--            Favorite jokes--}}
            <div class="row m-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="favorites" class="display-4">Favorite jokes</label>
                        <select class="form-control" id="favorites" name="favorites" size="5" multiple>
                            @foreach($favorites as $joke)
                                <option value="{!! $joke->key !!}">{!! $joke->value !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
{{--            Save button--}}
            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary mb-3" id="save" name="save">Save</button>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('extra-js')
    <script src="{!! asset('assets/js/home.js') !!}"></script>
    @endsection
