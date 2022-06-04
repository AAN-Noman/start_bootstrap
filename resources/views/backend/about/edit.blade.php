@extends('layouts.backendapp')
@section('title', 'Edit About | ')

@section('content')

    <section>
        <div class="container">
            <div class='row'>
                <div class="col-md-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>About Edit <a href="{{ route('backend.about.index') }}" class="btn btn-primary btn-sm">Back</a></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form action="{{ route('backend.about.update', $about->id ) }}" method="POST" enctype="multipart/form-data"
                                class="form-horizontal form-label-left">
                                @csrf
                                @method("PUT")

                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Title:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="Title"
                                            name="title" value="{{$about->title}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Description:<span
                                            class="required"></span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea class="form-control summernote" rows="3" placeholder="Description" name="description">{{$about->description}}</textarea>
                                    </div>
                                </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9  offset-md-3">
                                            <button type="submit" class="btn btn-success">Updated</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (session('success'))
        <div class="toast show" style="position: absolute; top: 0; right: 0;" data-delay="10000">
            <div class="toast-header">
                <strong class="mr-auto">{{ config('app.name') }}</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    @endif

@endsection

@section('backend_js')
    <script>
        $('.toast').toast('show');
    </script>
@endsection

