@extends('layouts.backendapp')
@section('title', 'show | ')

@section('content')

    <section>
        <div class="container">
            <div class='row'>
                <div class="col-md-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Show <a href="{{ route('frontend.contact.index') }}" class="btn btn-primary btn-sm">Back</a></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form action="#" method="POST" enctype="multipart/form-data"
                                class="form-horizontal form-label-left">
                                @csrf
                                @method("PUT")


                                <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Name:</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        {{ $contact->name }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Email:<span
                                            class="required"></span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        {{$contact->email}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">phone:<span
                                            class="required"></span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        {{$contact->phone}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3 ">Message:<span
                                            class="required"></span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        {{$contact->message}}
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
