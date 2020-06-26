@extends('layouts.app')


@section('content')
    <section class="section has-background-success">
        <div class="container">
            <!--<h1>Show species</h1>-->
            <showspecies :current-species="{{ $species }}"></showspecies>
            <animals :is-show="true" :current-species="{{ $species }}"></animals>
        </div>
    </section>
@endsection
