<!DOCTYPE html>
<html>

<head>
    <title>Upload Multiple Image</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <style>
            .images-preview-div img {
                padding: 10px;
                max-width: 200px;
            }
        </style>
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                <h2>Upload Multiple Images</h2>
            </div>
            <div class="card-body">
                <form name="images-upload-form" method="POST" action="{{ url('upload-multiple-image-preview') }}"
                    accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" name="images[]" id="images" placeholder="Choose images"
                                    multiple>
                            </div>
                            @error('images')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="mt-1 text-center">
                                <div class="images-preview-div"> </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <br>
        <hr>

        <h4><i class="glyphicon glyphicon-picture"></i> Display Data Image </h4>

        {{-- @foreach ($data as $image)
            <div class="card" style="width: 18rem;">
                <?php foreach (json_decode($image->filename)as $picture) { ?>
                <img src="{{ asset('/images/' . $picture) }}" style="height:120px; width:200px" />
                <?php } ?>
            </div>
        @endforeach --}}



        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            $(function() {
                // Multiple images preview with JavaScript
                var previewImages = function(input, imgPreviewPlaceholder) {
                    if (input.files) {
                        var filesAmount = input.files.length;
                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                    imgPreviewPlaceholder);
                            }
                            reader.readAsDataURL(input.files[i]);
                        }
                    }
                };
                $('#images').on('change', function() {
                    previewImages(this, 'div.images-preview-div');
                });
            });
        </script>
    </div>
</body>

</html
