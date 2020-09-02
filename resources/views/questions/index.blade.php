@extends('layouts.app')
@section('title', 'All questions')
@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2> پرسش ها</h2>
                        <div class="mr-auto">
                            <a href="{{route('questions.create')}}" class="btn btn-lg btn-outline-primary">سوالی
                                بپرسید</a>
                        </div>
                    </div>
                    <div class="mt-5">
                        @include('layouts.includes._messages')
                    </div>
                </div>

                <div class="card-body">
                    @forelse($questions as $question)
                   
                    @include('questions._excerp')
                    @empty
                     <div class="alert alert-warning">
                        <strong>پیام: </strong> متاسفانه هیچ سوالی وجود ندارد.     
                    </div>   
                    
                    @endforelse
                    {{$questions->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
