@extends('layouts.backendapp')
@section('title', 'Create Portfolio | ')

@section('content')

<section>
    <div class="container">
        <div class='row'>
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Portfolio <a href="{{ route('backend.portfolio.index') }}" class="btn btn-primary btn-sm">All Portfolio</a></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ route('backend.portfolio.store')}}" method="POST" enctype="multipart/form-data"
                            class="form-horizontal form-label-left">
                            @csrf
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Title</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Title"
                                        name="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Short Description<span
                                        class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control summernote" rows="3" placeholder="Short Description" name="shortDescription"></textarea>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Description<span
                                        class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control summernote" rows="3" placeholder="Description" name="description"></textarea>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Client</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="client"
                                        name="client">
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Category</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="category"
                                        name="category">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Image<span
                                        class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type='file' class="form-control" name="photo">
                                </div>
                            </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('backend_css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('backend_js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {

            $('.summernote').summernote({
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection

