@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Setting</li>
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
                   @if (session()->has('current_password'))
                    <div class="alert alert-danger">
                       {{ session()->get('message') }}
                    </div>
                   @endif
                    <div class="card">

                        <div class="card-body">
                            <form action="{{ route('admin.change.password') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                <label for="inputPassword5" class="form-label">Current Password</label>
                                <input type="text" id="inputPassword5" class="form-control  @error('current_password') is-invalid @enderror"
                                   aria-describedby="passwordHelpBlock" placeholder="Old Password" name="current_password" value="{{ old('current_password') }}" >

                                   @error('current_password')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputPassword5" class="form-label">New Password</label>
                                    <input type="password" id="inputPassword5" class="form-control  @error('new_password') is-invalid @enderror"
                                       aria-describedby="passwordHelpBlock" name="new_password"  placeholder="new password" >
                                       @error('new_password')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputPassword5" class="form-label">Confirm Password</label>
                                        <input type="password" id="inputPassword5" class="form-control  @error('confirm_password') is-invalid @enderror"
                                           aria-describedby="passwordHelpBlock" name="confirm_password" placeholder="confirm password">
                                           @error('confirm_password')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                        </div>

                                        <button type="submit" class="btn btn-success">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
