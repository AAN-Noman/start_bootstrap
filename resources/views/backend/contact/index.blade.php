@extends('layouts.backendapp')
@section('title', 'people message')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Contact Messages</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class='colume-title'>Id</th>
                                    <th class='colume-title'>Name</th>
                                    <th class='colume-title'>Email</th>
                                    <th class='colume-title'>phone</th>
                                    <th class='colume-title'>Message</th>
                                    <th class='colume-title'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $data)
                                    <tr class="even pointer">
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->Email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ Str::limit($data->message, 25, '...') }}</td>
                                        <td class="last">
                                            <a href="{{ route('frontend.contact.edit', $data->id) }}" class="btn btn-primary btn-sm">View/Edit</a>
                                            <form class='d-inline' action="{{ route('frontend.contact.destroy', $data->id) }}"
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
        </div>
    </div>


@endsection

