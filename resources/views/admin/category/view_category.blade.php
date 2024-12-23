@extends("layouts.admin.main")
@section('page-css')
<style>
    .owl-item {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    }
    .owl-carousel {
    height: auto !important;
    }


</style>
@endsection
@section('content')

<div class="content">
    @include('layouts.admin.header')

    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4 d-flex flex-column align-items-center text-center">
            <h2 class="mb-4">Category Show</h2>
            <div class="owl-item justify-content-center align-items-center" style="min-height: 400px;">
                <h3>{{ $category['name'] }}</h3>
                <div class="text" style="display:block">
                    <p>{!! $category['details'] !!}</p>
                </div>
            </div>
        <a href="{{ route('category.index') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
        

    @include('layouts.admin.footer')
</div>

@endsection