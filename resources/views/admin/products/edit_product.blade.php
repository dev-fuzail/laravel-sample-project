@extends("layouts.admin.main")
@section('page-css')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<style>

</style>
@endsection

@section('content')
<div class="content">
    @include('layouts.admin.header')
    <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Edit Product</h6>
        <form method="POST" id="product_form" action="{{ route('product.update', $product['id']) }}" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product['product_name'] }}" required aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="image_upload" class="form-label">Upload Picture</label>
                        <input class="form-control bg-dark" type="file" id="image_upload" name="image_upload" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check form-switch mb-3">
                        <label class="form-check-label" for="category">Category</label><br>
                        <select name="category" id="category" class="form-select">
                            @foreach($category as $data)
                            <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label class="form-label">Product Description</label>
                    <div id="detail">{!! $product['details'] !!}</div>
                    <textarea name="details" id="details" style="display:none"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top:100px">Submit</button>
        </form>
    </div>
    </div>
    @include('layouts.admin.footer')
</div>


@endsection
@section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<script>
  $(document).ready(function(){
    const quill = new Quill('#detail', {
    modules: {
                toolbar: [
                    [{ header: [1, 2, false] }],
                    ['bold', 'italic'],
                ],
            },
            theme: 'snow',
  });

  $("#product_form").on('submit', function () {
    // Get Quill content
    const htmlContent = quill.root.innerHTML;

    // Assign content to the hidden textarea
    $('#details').val(htmlContent); 
    });
  })
</script>
@endsection