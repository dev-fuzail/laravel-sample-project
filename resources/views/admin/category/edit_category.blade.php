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
        <h6 class="mb-4">Edit Category</h6>
        <form method="POST" id="category_form" action="{{ route('category.update', $category['id']) }}" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category['name'] }}" required aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label class="form-label">Category Description</label>
                    <div id="detail">{!! $category['details'] !!}</div>
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

  $("#category_form").on('submit', function () {
    // Get Quill content
    const htmlContent = quill.root.innerHTML;

    // Assign content to the hidden textarea
    $('#details').val(htmlContent); 
    });
  })
</script>
@endsection