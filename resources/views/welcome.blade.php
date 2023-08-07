<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style="background-color: #777">

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 mt-4">
                    <div class="card" style="border-radius: 20px">
                        <div class="card-header">
                            <img src="{{ asset('/') }}dist/img/bg-im.jpeg" alt="" height="200" width="100%" style="border-radius: 20px">
                        </div>
                        <div class="card-body">
                            <form action="{{ route('search.image') }}" method="get" id="myForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Report ID</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="type report id" name="search_key" id="report_id" value="{{ old('search_key') }}">

                                    @if (session()->has('message'))
                                    <div class="alert alert-danger mt-2">
                                        {{ session()->get('message') }}
                                     </div>

                                    @endif
                                  </div>

                                  <div class="mb-3 text-center">
                                   <button type="submit" class="btn btn-success px-5 mb-4">Verify</button> <br/>

                                  </div>
                            </form>

                            <div class="mb-3 text-center">
                                <button type="button" class="btn btn-warning px-5 mb-4" onclick="resetForm()">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

        <script>
            function resetForm() {

                document.getElementById("myForm").reset();
            }
            </script>
</body>
</html>
