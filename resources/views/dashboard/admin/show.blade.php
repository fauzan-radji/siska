@extends('dashboard.layouts.main')

@section('title')
  Dashboard | {{ $admin->user->nama }}
@endsection

@section('head')
  <style>
    .card {
      transition: all 0.5s;
    }

    .image {
      transition: all 0.5s;
      width: 100px;
      height: 100px;
    }

    .card:hover .image {
      transform: scale(1.1)
    }

    .idd {
      font-size: 14px;
      font-weight: 600;
    }

    .idd1 {
      font-size: 12px;
    }
  </style>
@endsection

@section('main')
  <div class="card p-4 mt-3">
    <div class="d-flex flex-column justify-content-center align-items-center">
      <img class="image object-fit-cover rounded-circle" src="https://api.multiavatar.com/{{ $admin->user->username }}.svg" />
      <h3 class="mt-3">{{ $admin->user->nama }}</h3>
      <h5>{{ $admin->user->username }}</h5>
      <span class="idd1">{{ $admin->user->email }}</span>
      <a class="mt-3 btn btn-dark" href="/dashboard/admin/{{ $admin->id }}/edit">Edit Profile</a>
    </div>
  </div>
@endsection
