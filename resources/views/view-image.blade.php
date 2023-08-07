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
                        <div class="card-body text-center">

                            @if(session('data'))
                            <div class="alert alert-success">
                                {{ session('data')['message'] }}
                            </div>
                            <!-- You can also access the updated image data if needed -->
                            @if(session('data')['data_img'])
                                <p>Report ID : {{ session('data')['data_img']->search_key }}</p>
                                <img src="{{ asset('/storage/'.session('data')['data_img']->image) }}" alt="" width="400px" height="400px">
                            @endif
                            <div class="mt-4">
                            <a href="{{ url('/') }}" class="btn btn-secondary">Go to Back</a>
                            <a href="{{ route('download-image',session('data')['data_img']->id) }}" target="_blank" class="btn btn-success" download>Download Image</a>
                        </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
