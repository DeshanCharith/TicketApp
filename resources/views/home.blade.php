@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="post" action="{{ route('ticket.search') }}">
             @csrf
            <div class="form-group">
              <label>Search</label>
              <input type="text" name="cus_name" style="max-width:240px;" class="form-control" placeholder="Enter customer name" >
            <button type="submit" class="btn btn-outline-dark" style="margin-left:260px;margin-top:-60px;" >Search</button>
            </form>

           
            <table class="table">
                <thead class="thead-dark"> 
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Problem</th>
                    <th scope="col">Feedback</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tickets as $ticket)
                  @if ($ticket->open=="No")
                  <tr style="background-color:#caf2fc">
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->cus_name }}</td>
                    <td style="max-width:500px">{{ $ticket->email }}</td>
                    <td style="max-width:500px">{{ $ticket->phone_no }}</td>
                    <td style="max-width:500px">{{ $ticket->problem }}</td>
                    <td style="max-width:500px">{{ $ticket->feed_back }}</td>
                    <td style="min-width:200px">
                    <button type="button" class="btn btn-sm editbtn btn-dark" data-toggle="modal" data-target="">View</button>
                    <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-sm btn-warning">Feedback</a>
                    <a href="{{ route('ticket.delete', $ticket->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @else
                  <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->cus_name }}</td>
                    <td style="max-width:500px">{{ $ticket->email }}</td>
                    <td style="max-width:500px">{{ $ticket->phone_no }}</td>
                    <td style="max-width:500px">{{ $ticket->problem }}</td>
                    <td style="max-width:500px">{{ $ticket->feed_back }}</td>
                    <td style="min-width:200px">
                    <button type="button" class="btn btn-sm editbtn btn-dark" data-toggle="modal" data-target="">View</button>
                    <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-sm btn-warning">Feedback</a>
                    <a href="{{ route('ticket.delete', $ticket->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>          
              <div style="float:right;">
                  {{ $tickets->links() }}
              </div>
        </div>
    </div>
</div>

 <!-- Bootstrap model use for view details -->
<div class="modal fade" id="editmodal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">View Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">View Ticket</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('ticket.update',$ticket->id)}}"> 
                    @csrf
                        <div class="form-group">
                          <label>ID</label>
                          <input type="text" name="id" id="id" class="form-control" placeholder="Enter " required  disabled>
                        </div>
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="cus_name" id="cus_name" class="form-control" placeholder="Enter " required value="{{ $ticket->cus_name }}" disabled>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" id="email" class="form-control" placeholder="Enter " required value="{{ $ticket->email }}" disabled>
                        </div>
                        <div class="form-group">
                          <label>Telephone</label>
                          <input type="text" name="phone_no"  id="phone_no"  class="form-control" placeholder="Enter " required value="{{ $ticket->phone_no }}" disabled>
                        </div>
                        <div class="form-group">
                          <label>Problem</label>
                          <textarea class="form-control" name="problem" id="problem" placeholder="Enter problem description" rows="4"  placeholder="Enter " value="{{ $ticket->problem }}" disabled>{{ $ticket->problem }}</textarea>
                        </div>
                          <div class="form-group">
                          <label>Feedback</label>
                          <textarea class="form-control" name="feed_back" id="feed_back" placeholder="Enter problem description" rows="4"  placeholder="Enter feedback" disabled ></textarea>
                        </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
 <!-- End of Bootstrap model use for view details -->
 <script>
    $(document).ready(function(){
        $('.editbtn').on('click', function(){

            $('#editmodal').modal('show');
            $tr =$(this).closest('tr');
            var data= $tr.children("td").map(function(){
              return $(this).text();
            }).get();

            $('#id').val(data[0]);
            $('#cus_name').val(data[1]);
            $('#email').val(data[2]);
            $('#phone_no').val(data[3]);
            $('#problem').val(data[4]);
            $('#feed_back').val(data[5]);

//var id= 1;
// $.ajax({
//    type:'POST',
//    enctype: 'multipart/form-data',
//    url:'/ticket/id/update',
//    data: formdata,
//    contentType: false,
//    processData: false,
//    success:function(data){
//         $('.alert-success').html(data.success).fadeIn('slow');
//         $('.alert-success').delay(3000).fadeOut('slow');
//    }
// });
        });
    });


  </script>

@endsection
