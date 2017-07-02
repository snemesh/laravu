@extends('layouts.app')

@section('navbar')

    <navbar></navbar>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User profile</div>

                <div class="panel-body">
                    <profile></profile>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
