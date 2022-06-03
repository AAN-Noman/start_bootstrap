@extends('layouts.backendapp')
@section('title', 'logo-')
@section('content')
<section>
    <div class="container">
        <div class='row'>
            <div class="col-md-5 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>add LoGo</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ route('backend.logo.store')}}" method="POST" enctype="multipart/form-data"
                            class="form-horizontal form-label-left">
                            @csrf
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Logo Title</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Logo Title"
                                        name="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Logo Description<span
                                        class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control" rows="3" placeholder="Logo Description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">Logo Image<span
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
                <div class="col-md-7">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>All LoGo</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class='colume-title'>Id</th>
                                        <th class='colume-title'>Image</th>
                                        <th class='colume-title'>Title</th>
                                        <th class='colume-title'>Description</th>
                                        <th class='colume-title'>Status</th>
                                        <th class='colume-title'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $data)
                                        <tr class="even pointer">
                                            <td>{{ $data->id }}</td>
                                            <td>
                                                <img width="100" src="{{ asset('storage/logo/' . $data->photo) }}"
                                                    alt="">
                                            </td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ Str::limit($data->description, 25, '...') }}</td>
                                            <td>{{ $data->status == 1 ? 'Active' : 'Deactive' }}</td>
                                            <td class="last">
                                                <a href="{{ route('backend.logo.show', $data->id) }}" class="btn btn-primary btn-sm">View</a>
                                                <form class='d-inline' action="{{ route('backend.logo.destroy', $data->id) }}"
                                                    method='POST'>
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;" data-delay="10000">
                        <div class="toast" style="position: absolute; top: 0; right: 0;">
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
                    </div>
                @endif
            </div>
        </div>


    @endsection

    @section('backend_js')
        <script>
            $('.toast').toast('show')
        </script>
        </div>
    </div>
</section>
@endsection
