@extends('dashboard.layouts.main')

@section('title', $admin->user->nama)

@section('head')
@endsection

@section('main')
  <div class="card">
    <div class="d-flex flex-column justify-content-center align-items-center">
      <img class="image object-fit-cover rounded-circle" src="/img/default-profile/user0.png" />
      <h3 class="mt-3">{{ $admin->user->nama }}</h3>
      <h5>{{ $admin->user->username }}</h5>
      <span class="idd1">{{ $admin->user->email }}</span>
      <a class="mt-3 btn btn-primary" href="/dashboard/admin/{{ $admin->id }}/edit"><i class="bi bi-pencil-square"></i> Edit Profile</a>
    </div>
  </div>
@endsection
