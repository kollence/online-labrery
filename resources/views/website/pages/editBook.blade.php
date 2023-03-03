@extends('website.layout')
@section('title', "Edit Book")
@section('description', "Desc")
@section('content')




<div class="container mb-5">
    <div class="row mt-5 pb-4">
        <h2 class="d-inline mx-auto text-wrap text-center pb-4">Edit Book</h2>
    </div>
    <div class="products-wrap">
        <div class="d-flex justify-content-center">
            <div class="col-6">
                <form action="{{ route('book.update', $book->id) }}" class="" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" name="title" value="{{$book->title}}" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                        <div id="textHelp" class="form-text">We'll never share your text with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$book->description}}</textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Book Number</label>
                        <input type="text" name="book_number" value="{{$book->book_number}}" class="form-control" id="book_number" aria-describedby="textHelp">
                        <div id="textHelp" class="form-text">We'll never share your text with anyone else.</div>
                    </div>
                    <div class="form-group mb-3 ">
                        <label for="exampleFormControlSelect1">Author</label>
                        <select class="form-control" name="author_id" id="exampleFormControlSelect1">
                            @foreach($authors as $author)
                            <option value="{{$author->id}}" @if($book->author_id == $author->id) selected @endif>{{$author->name}} {{$author->surname}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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