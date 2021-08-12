@extends('layouts.app')

@section('title', 'Product Index')

@push('css')
@endpush

@section('content')

	<homepage :eventlist="{{ $events->toJson() }}"></homepage>

@endsection



@push('scripts')
<!-- Load vue model JS -->
<script src="/js/app.js"></script>
@endpush
