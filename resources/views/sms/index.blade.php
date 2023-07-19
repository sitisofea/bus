@extends('layouts.auth')
@section('styles')
    <link rel="stylesheet" href="path/to/ti-icons.css">
@endsection

@section('content')
    <div class="card">
        <div class="p-4">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="float-start">
                        <h2>SMS Management</h2>
                    </div>
                    <div class="float-end">
                        <a class="btn btn-outline-success btn-uppercase" href='sms/create'><i class="ti-plus mr-2"></i>NEW
                            SMS</a>
                    </div>
                </div>
            </div><br>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-with-border">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table id="datatable" class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Publish Date</th>
                        <th>Status</th>
                        <th width="70px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($SMS as $sms)
                        <tr>
                            <td>{{ $sms->title }} </td>
                            <td>{{ $sms->content }} </td>
                            <td>{{ $sms->date }}</td>
                            @if ($sms->status)
                                <td>Sent</td>
                            @else
                                <td>Draft</td>
                            @endif
                            <td>
                                <a href="{{ route('sms.show', $sms->id) }}" class="btn btn-outline-primary btn-floating"
                                    title="Show SMS"><i class="ti-new-window"></i></a>
                                <a href="{{ route('sms.edit', $sms->id) }}" class="btn btn-outline-success btn-floating"
                                    title="Edit SMS"><i class="ti-pencil"></i></a>
                                <button type="button" data-toggle="modal" data-target="#delete-{{ $sms->id }}"
                                    class="btn btn-outline-danger btn-floating" title="Delete SMS"><i
                                        class="ti-trash"></i></button>
                                <div class="modal fade" id="delete-{{ $sms->id }}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Delete SMS</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i class="ti-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to permenantly delete this SMS?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('sms.destroy', $sms->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-outline-light"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete SMS</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
