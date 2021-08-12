@extends('layouts.app')

@section('title', 'Product Index')

@push('css')
@endpush

@section('content')

	<product-index :productlist="{{ $productlist->toJson() }}"></product-index>

@endsection



@push('scripts')
<!-- Load vue model JS -->
<script src="/js/app.js"></script>
@endpush
