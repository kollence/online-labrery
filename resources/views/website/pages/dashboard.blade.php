@extends('website.layout')
@section('title', "Dashboard")
@section('description', "Desc")
@section('content')




<div class="container mb-5">
    <div class="row mt-5 pb-4">
        <h2 class="d-inline mx-auto text-wrap text-center pb-4">Manage Site</h2>
    </div>
    <div class="products-wrap">
        <div class="row">
            <div class="col-md-4">

                <ul style="list-style-type: none; margin: 0; padding: 0;">
                    <li class="border p-2 my-2 rounded"><a href="{{route('books')}}" class="btn btn-light w-100">All Books</a></li>
                    @foreach($books as $book)
                    <li class="border p-2 my-2 rounded">
                        <div>
                            <div class="card-title">{{$book->title}}</div>
                            <small>book number: </small><span class="card-subtitle mb-2 text-warning">{{$book->book_number}}</span>
                        </div>
                        <div class="card-footer">
                            Author: <a href="#" class="card-link">{{$book->author->name}}</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4">

                <ul style="list-style-type: none; margin: 0;">
                <li class="border p-2 my-2 rounded"><a href="#" class="btn btn-light w-100">All Authors</a></li>
                    @foreach($authors as $author)
                    <li class="border p-2 my-2 rounded">
                        <a href="">
                            <div>
                                <div class="p-2">
                                    <img src="{{$author->image_url}}" alt="" style="object-fit: contain; width: 100%;">
                                </div>
                                <span class="card-title">{{$author->name}} {{$author->surname}}</span>

                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4">

                <ul style="list-style-type: none; margin: 0;">
                <li class="border p-2 my-2 rounded"><a href="{{route('users')}}" class="btn btn-light w-100">All User</a></li>
                    @foreach($users as $user)
                    <li class="border p-2 my-2 rounded">
                        <div>
                            <span class="card-title">{{$user->name}} {{$user->surname}}</span>
                            <div class="card-footer">
                                <small>email: </small><br><span class="card-link">{{$user->email}}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>

    </div>
    <div class="row align-items-center">
        <div class=" col-md-3">
            <!-- <div class="align-middle"> -->
            <!-- </div> -->
        </div>
    </div>

</div>


@section('scripts')
<script>
    $(document).ready(function() {
        // alert('test')
    });
</script>
@endsection

@endsection