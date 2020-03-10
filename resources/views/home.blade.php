@extends('app')

@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @endsection

@section('content')
    <div class="row">
        <div class="col-md-2">
            <div class="text-center">
                <img alt="Logo" class="m-3" width="80%" src="https://api.chucknorris.io/img/chucknorris_logo_coloured_small@2x.png">

                {{--            Save button--}}
                <div class="m-4">
                    <button class="btn btn-primary" id="save" name="save">Save</button>
                </div>

{{--                Reset page--}}
                <div class="m-4">
                    <button class="btn btn-light" id="reset" name="reset" type="reset">Try again</button>
                </div>
            </div>
        </div>
        <div class="col-md-10">
{{--            List of all jokes--}}
            <div class="row">
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
                <div class="col-md-12 m-3 text-center">
                    <button class="btn btn-success mr-3" id="add" name="add">
                        Add to favorites
                    </button>
                    <button class="btn btn-danger" id="remove" name="remove">
                        Remove from favorites
                    </button>
                </div>
            </div>

{{--            Favorite jokes--}}
            <div class="row">
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
    </div>

{{--    Modal--}}
    <div class="modal fade" id="modalInfo" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" id="title">
                    <h4 class="modal-title">Chuck Norris jokes</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <p id="message"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    @endsection

@section('extra-js')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{!! asset('assets/js/home.js') !!}"></script>
    @endsection
