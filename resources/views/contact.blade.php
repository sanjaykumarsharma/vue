@extends('layouts.app')

@section('content')

    <div class="row">
        <img src="{{ asset('images/thebignews.jpg') }}" alt="thebignews" class="img-responsive">
    </div>

    <div class="row" style="padding-top:20px;padding-bottom:20px;">
        <div class="col-md-6 col-md-offset-2 boby-pd">

            @if (Session::has('success'))

                <div class="alert alert-success" role="alert">
                    <strong>Success:</strong> {{ Session::get('success') }}
                </div>

            @endif

            @if (count($errors) > 0)

                <div class="alert alert-danger" role="alert">
                    <strong>Errors:</strong>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>

            @endif

            <form action="{{ url('contact/help-desk') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control">
                </div>

                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea id="message" name="message" class="form-control" placeholder="Type your message here..."></textarea>
                </div>

                <input type="submit" value="Send Message" class="btn btn-success">
            </form>

        </div>
        <div class="col-md-4">

        </div>
    </div>

@endsection