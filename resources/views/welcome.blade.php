
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send Your Problem</div>

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

                    <form method="post" action="{{ route('ticket.create') }}">
                        @csrf
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="cus_name" class="form-control" placeholder="Enter " required >
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" placeholder="Enter" required >
                        </div>
                        <div class="form-group">
                          <label>Telephone</label>
                          <input type="text" name="phone_no" class="form-control" placeholder="Enter " required >
                        </div>
   
                        <div class="form-group">
                          <label>Problem description</label>
                          <textarea class="form-control" name="problem" placeholder="Enter problem description" rows="6"  placeholder="Enter "></textarea>
                          <button type="submit" class="btn btn-primary mt-3">Send</button>

                          
                        @if (session('status'))
                        <div style="float:right">
                          <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                          <lottie-player src="https://assets10.lottiefiles.com/private_files/lf30_GAiHca.json"  background="transparent"  speed="1"  style="width: 100px; height: 100px;"  loop  autoplay></lottie-player>                      
                        </div>
                        @endif

                        @if (session('error'))
                        <div style="float:right">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_gzlupphk.json"  background="transparent"  speed="1"  style="width: 80px; height: 80px;"  loop  autoplay></lottie-player>
                        </div>
                        @endif
 
                     </div> 
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection


