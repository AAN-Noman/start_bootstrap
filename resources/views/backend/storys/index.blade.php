@extends('layouts.backendapp')
@section('title', 'Our story')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>All Story <a href="{{ route('backend.story.create') }}" class='btn btn-primary btn-sm'>Add Story</a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th class='colume-title'>Id</th>
                                <th class='colume-title'>Image</th>
                                <th class='colume-title'>Date</th>
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
                                        <img width="100" src="{{ asset('storage/story/' . $data->photo) }}"
                                            alt="">
                                    </td>
                                    <td>{{ $data->date }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ Str::limit($data->description, 25, '...') }}</td>
                                    <td>{{ $data->status == 1 ? 'Active' : 'Deactive' }}</td>
                                    <td class="last">
                                        <a href="{{ route('backend.story.edit', $data->id) }}" class="btn btn-primary btn-sm">View/Edit</a>
                                        <form class='d-inline' action="{{ route('backend.story.destroy', $data->id) }}"
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
@endsection
