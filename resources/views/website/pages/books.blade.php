@extends('website.layout')
@section('title', "Dashboard")
@section('description', "Desc")
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">



<div class="container mb-5">
    <div class="row mt-5 pb-4">
        <h2 class="d-inline mx-auto text-wrap text-center pb-4">Manage Site</h2>
    </div>
    <div class="products-wrap">
        <div class="row">
            <div class="col-md-12">
                <h4>Books:</h4>
                <div class="table-responsive">
                    <table id="booksTable" class="table table-bordred table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Book Num.</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>eee</th>
                                <th>ddd At</th>
                            </tr>
                        </thead>
                    </table>

                </div>
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
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    var table1;
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': CSRF_TOKEN
            }
        });
        table1 = $('#booksTable').DataTable({
            serverSide: true,
            ajax: "{{ url('/booksdt') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'book_number',
                    name: 'book_number'
                },
                {
                    data: 'author_id',
                    name: 'author_id'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    title: "edit",
                    "defaultContent": "<button class='btn btn-warning' onclick='edititem(this);'>Edit</button>"
                },
                {
                    title: "delete",
                    "defaultContent": "<button class='btn btn-danger' onclick='deleteitem(this);'>Delete</button>"
                }
            ]
        }); 
    });

    function edititem(obj) {
        let rowID = $(obj).attr('id');
        let bookId = $(obj).closest('tr').find('td:first').html();
        let url1 = '{{ route("books.edit", ":id") }}';
        const urlz = url1.replace(':id', bookId);
        // alert(url)
        window.location.href = urlz;
    }

    function deleteitem(obj) {
        
        let booksTable = $('#booksTable');
        
        // confirm('Are you 101% sure that you maybe want to delete?')
        let rowID = $(obj).attr('id');
        let bookId = $(obj).closest('tr').find('td:first').html();
        let url2 = '{{ route("books.delete", ":id") }}';
        const urld = url2.replace(':id', bookId);
 // Delete record;

            var deleteConfirm = confirm("Are you sure?");
            if (deleteConfirm == true) {
                 // AJAX request
                 $.ajax({
                     url: urld,
                     type: 'post',
                     data: {_token: CSRF_TOKEN, book: bookId},
                     success: function(response){
                          if(response.success == 1){
                               alert("Record deleted.");
                               // Reload DataTable
                               table1.ajax.reload();
                          }else{
                                alert("Invalid ID.");
                          }
                     }
                 });
            }
    }
</script>
@endsection

@endsection