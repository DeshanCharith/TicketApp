@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Give Feedback to Customer</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('ticket.update',$ticket->id)}}"> 
                    @csrf
                        <div class="form-group">
                          <label>ID</label>
                          <input type="text" name="id" id="id" class="form-control" placeholder="Enter " required  value="{{ $ticket->id }}" disabled>
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
                          <textarea class="form-control" name="feed_back" id="feed_back" placeholder="Enter problem description" rows="4"  placeholder="Enter feedback" required >{{ $ticket->feed_back }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Save & Send Mail</button>

                        <div style="float:right;margin-top:-10px;margin-right:-20px">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets6.lottiefiles.com/packages/lf20_tszzqucf.json"  background="transparent"  speed="1"  style="width: 80px; height: 80px;"  loop  autoplay></lottie-player>
                        </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
