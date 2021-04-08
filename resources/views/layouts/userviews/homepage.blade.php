@extends('layouts.user')

@section('content')
    {{--Slider--}}
    @livewire('homepage-sliders')

    {{--How we work and Why Us ?--}}
    @livewire('how-we-work-section')


    @livewire('all-time-hit-brands')
@endsection
