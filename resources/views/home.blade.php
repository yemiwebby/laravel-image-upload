<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <title>Cloudinary Image Upload</title>
    <meta name="description" content="Prego is a project management app built for learning purposes">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Cloudinary Image Upload</a>
        </div>
    </div>
</nav>



<div class="container" style="margin-top: 100px;">
    <div class="row">
        <h4 class="text-center">
            Upload Images
        </h4>

        <div class="row">
            <div id="formWrapper" class="col-md-4 col-md-offset-4">
                <form class="form-vertical" role="form" enctype="multipart/form-data" method="post" action="{{ route('uploadImage')  }}">
                    {{csrf_field()}}
                    @if(session()->has('status'))
                        <div class="alert alert-info" role="alert">
                            {{session()->get('status')}}
                        </div>
                    @endif
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="file" name="image_name" class="form-control" id="name" value="">
                        @if($errors->has('image_name'))
                            <span class="help-block">{{ $errors->first('image_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Upload Image </button>
                    </div>
                </form>

            </div>
        </div>


        <div class="row" id="displayImages">
            @if($images)
                @foreach($images as $image)

                    <div class="col-md-3">
                        <a href="{{$image->image_url}}" target="_blank">
                            <img src="{{asset('uploads/'.$image->image_name)}}" class="img-responsive" alt="{{$image->image_name}}">
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
</body>
</html>