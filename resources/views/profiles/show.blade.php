@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow rounded-lg mt-8">
  <div class="flex items-center space-x-6">
    {{-- Profielfoto of initiaal --}}
    @if($user->profile_photo)
      <img 
        src="{{ asset('storage/'.$user->profile_photo) }}" 
        alt="{{ $user->username ?? $user->name }}" 
        class="w-24 h-24 rounded-full object-cover border-2 border-gray-300"
      >
    @else
      <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-2xl font-semibold">
        {{ strtoupper(substr($user->name, 0, 1)) }}
      </div>
    @endif

    <div>
      <h1 class="text-3xl font-bold text-gray-800">
        {{ $user->username ?? $user->name }}
      </h1>
      <p class="text-gray-600">
        {{ $user->email }}
      </p>
      @if($user->birthday)
        <p class="mt-1 text-gray-500">
          🎂 {{ $user->birthday->format('d M Y') }}
        </p>
      @endif
    </div>
  </div>

  {{-- Over mij --}}
  <div class="mt-6 prose prose-gray">
    @if($user->about_me)
      {!! nl2br(e($user->about_me)) !!}
    @else
      <p class="italic text-gray-500">Deze gebruiker heeft nog niets over zichzelf geschreven.</p>
    @endif
  </div>
</div>
@endsection
