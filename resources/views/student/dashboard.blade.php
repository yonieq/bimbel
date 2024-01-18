@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <h3>{{ $title }}</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="{{ asset('storage/user'. auth()->user()->photo) }}" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{ auth()->user()->name }}</h5>
                                <h6 class="text-muted mb-0">{{ auth()->user()->email }}</h6>
                                <h6 class="text-muted mb-0">{{ auth()->user()->no_telp }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
