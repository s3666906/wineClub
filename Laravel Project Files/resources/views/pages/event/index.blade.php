@extends('layouts.app')

@section('title', 'Product Index')

@push('css')
@endpush

@section('content')

	<event-index
	:event-data="{{ $events->toJson() }}"></event-index>

@endsection



@push('scripts')
<!-- Load vue model JS -->
<script src="/js/app.js"></script>
@endpush
