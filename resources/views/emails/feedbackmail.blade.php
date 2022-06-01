@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send Feedback</div>

                    <div class="card-body">
                        
                    @if (session('status_email'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status_email') }}
                        </div>
                    @endif
        
                    <h4>Feedback Of Your reported problem  Ref No:00 {{Session::get('feed_back_id')}}</h4>
                    <p>{{ Session::get('feed_back')}}</p>
                    <p>Thank you!</p>

                    <a  href="{{ route('send-email',Session::get('feed_back_id')) }}" class="btn btn-sm btn-warning">Send Mail</a>
                        
                    </div>
        </div>
    </div>
</div>
 
@endsection