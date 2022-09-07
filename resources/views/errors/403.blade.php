@extends('errors::minimal')

@section('title', __('Forbidden hi myo htet'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
