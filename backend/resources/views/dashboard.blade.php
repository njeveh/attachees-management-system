@extends('layouts.app')
@section('navbar')
    <x-navbar>
        <x-slot:heading>
            AIMS
        </x-slot:heading>
    </x-navbar>
@endsection
@section('sidenav')
    <!-- Sidebar  -->
    @if (Auth::user()->attachee)
        <x-attachee-side-nav-links />
    @elseif (Auth::user()->dipcaAdmin)
        <x-dipca-admin-side-nav-links />
    @elseif (Auth::user()->departmentAdmin)
        <x-department-admin-side-nav-links />
    @endif
@endsection
@section('content')
    <x-navbar>
        <x-slot:heading>
            AIMS
        </x-slot:heading>
    </x-navbar>


    </div>
@endsection
