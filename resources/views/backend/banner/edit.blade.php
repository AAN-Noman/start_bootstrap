@extends('layouts.backendapp')
@section('title', 'All Banner | ')

@section('content')

    <section>
        <div class="container">
            <div class='row'>
                <div class="col-md-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Banner Edit <a href="{{ route('backend.banner.index') }}" class="btn btn-primary btn-sm">All Banner</a></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form action="{{ route('backend.banner.update', $banner->id ) }}" method="POST" enctype="multipart/form-data"
                                class="form-horizontal form-label-left">
                                @csrf
                                @method("PUT")

                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Banner Title</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type="text" class="form-control" placeholder="Banner Title"
                                            name="title" value="{{$banner->title}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Banner Description<span
                                            class="required"></span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <textarea class="form-control summernote" rows="3" placeholder="Banner Description" name="description">{{$banner->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Banner Image<span
                                            class="required"></span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input type='file' class="form-control" name="photo">
                                        <img width="100" class='mt-3' src="{{ asset('storage/banner/' . $banner->photo) }}" alt="">
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


@section('backend_css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('backend_js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.toast').toast('show');

            $('.summernote').summernote({
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection

