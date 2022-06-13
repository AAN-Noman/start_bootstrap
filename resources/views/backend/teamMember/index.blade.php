@extends('layouts.backendapp')
@section('title', 'Team Member-')
@section('content')
<section>
    <div class="container">
        <div class='row'>
            <div class="col-md-5 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>add Member</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{ route('backend.teamMember.store')}}" method="POST" enctype="multipart/form-data"
                            class="form-horizontal form-label-left">
                            @csrf
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Name:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Name"
                                        name="name">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Proportion:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Proportion"
                                        name="proportion">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Towiter:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="towiter"
                                        name="towiter">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Facebook:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="facebook"
                                        name="facebook">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="control-label col-md-3 col-sm-3 ">Linkedin:</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Linkedin"
                                        name="linkedin">
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
                                        <th class='colume-title'>Name</th>
                                        <th class='colume-title'>Proportion</th>
                                        <th class='colume-title'>Status</th>
                                        <th class='colume-title'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $data)
                                        <tr class="even pointer">
                                            <td>{{ $data->id }}</td>
                                            <td>
                                                <img width="100" src="{{ asset('storage/teamMember/' . $data->photo) }}"
                                                    alt="{{ $data->name }}">
                                            </td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->proportion }}</td>
                                            <td>{{ $data->status == 1 ? 'Active' : 'Deactive' }}</td>
                                            <td class="last">
                                                <a href="{{ route('backend.teamMember.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form class='d-inline' action="{{ route('backend.teamMember.destroy', $data->id) }}"
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
</section>
@endsection
