@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <!--<h1>Show species</h1>-->
            <showspecies :current-species="{{ $species }}"></showspecies>
        </div>
    </section>
@endsection
