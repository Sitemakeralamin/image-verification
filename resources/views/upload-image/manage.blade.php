@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Image</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Image</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                       {{ session()->get('message') }}
                    </div>
                   @endif
                   @if (session()->has('error'))
                    <div class="alert alert-danger">
                       {{ session()->get('error') }}
                    </div>
                   @endif
                    <div class="card">

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>Report ID</th>
                                <th>File Name</th>
                                <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach ($images as $image )
                                <tr>
                                    <td>{{ $image->search_key }}</td>
                                    <td>{{ $image->image }}</td>
                                    <td><a href="{{ route('edit.image',$image->id) }}" class="btn btn-success btn-small"><i class="fa fa-edit"></i></a>  <a href="{{ route('delete.image',$image->id) }}" class="btn btn-danger btn-small" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></td>
                                  </tr>

                                @endforeach

                            </table>
                          </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
