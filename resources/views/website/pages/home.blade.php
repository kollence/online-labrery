@extends('website.layout')
@section('title', "Home")
@section('description', "Desc")
@section('content')




<div class="container mb-5">
    <div class="row mt-5 pb-4">
        <h2 class="d-inline mx-auto text-wrap text-center pb-4">Online Library</h2>
    </div>
    <div class="products-wrap">
        <div class="row">
            @foreach($books as $book)
            <div class="col-sm mb-3 d-flex align-items-stretch" >
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$book->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$book->book_number}}</h6>
                        <p class="card-text">{{Str::limit($book->description, 59)}}</p>
                        
                    </div>
                    <div class="card-footer">
                        Author: <a href="#" class="card-link">{{$book->author->name}}</a>
                    </div>
                </div>

            </div>
                @endforeach
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
