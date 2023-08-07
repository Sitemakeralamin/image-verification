@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Upload Image</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Upload Image</li>
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
                            <form action="{{ route('image.save') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                <label for="inputPassword5" class="form-label">Upload Image</label>
                                <input type="file" id="inputPassword5" class="form-control  @error('image') is-invalid @enderror"
                                   aria-describedby="passwordHelpBlock" name="image" >

                                   @error('image')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputPassword5" class="form-label">Search Key</label>
                                    <input type="text" id="inputPassword5" class="form-control  @error('search_key') is-invalid @enderror"
                                       aria-describedby="passwordHelpBlock" name="search_key"  placeholder="Search Key" >
                                       @error('search_key')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                                    </div>

                                  <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
