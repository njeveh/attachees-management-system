@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-dipca-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <x-footer />
        </div>

    </div>
@endsection
