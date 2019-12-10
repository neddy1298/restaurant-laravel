@extends('layouts.app')

@if($data == 0)
@section('content')
@include('order.detail_order.noData')
@endsection

@else
@section('content')
@include('order.detail_order.withData')
@endsection
@endif