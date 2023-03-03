@extends('website.layout')
@section('title', "Profile")
@section('description', "Desc")
@section('content')




<div class="container mb-5">
    <div class="row mt-5 pb-4">
        <h2 class="d-inline mx-auto text-wrap text-center pb-4">{{auth()->user()->name}} {{auth()->user()->surname}}</h2>
    </div>
    <div class="products-wrap">
        <div class="row">
           Hello
        </div>
        
    </div>
    <div class="row align-items-center">
        <div class=" col-md-3">
                <!-- <div class="align-middle"> -->
                {{ $books->links() }}
                <!-- </div> -->
            </div>
        </div>

</div>


@section('scripts')
<script>
    $(document).ready(function () {
        // alert('test')
    }); 
</script>
@endsection

@endsection
