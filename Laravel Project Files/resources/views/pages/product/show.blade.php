@extends('layouts.app')

@section('title', 'Product Index')

@push('css')
@endpush

@section('content')


	<product-show
	:product="{{$product}}"
	:ratings="{{ $ratings }}"></product-show>

@endsection



@push('scripts')
<!-- Load vue model JS -->
<script src="/js/app.js"></script>
@endpush
