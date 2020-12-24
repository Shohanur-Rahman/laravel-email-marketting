@extends('layouts.admin_layout')

@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Send your mails') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                        <form enctype="multipart/form-data" method="post" action="{{route('sendEmail')}}">
                            @csrf
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" aria-describedby="emailHelp" placeholder="Enter email subject" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="xl_list" style="width: 100%; display: block;">XL</label>
                                <input type="file" class="" id="xl_list" name="xl_list" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                                <small id="emailHelp" class="form-text text-muted">Choose Email List From XL File...</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Email</button>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection
