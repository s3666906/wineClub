@extends('layouts.app')

@section('title', 'Product Index')

@push('css')
@endpush

@section('content')

	<account :user="{{ $user }}"></account>

@endsection



@push('scripts')
<!-- Load vue model JS -->
<script src="/js/app.js"></script>
@endpush
