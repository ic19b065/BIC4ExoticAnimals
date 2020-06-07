@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <!--<h1>Show animal</h1>-->
            <showanimal :current-animal="{{ $animal }}"></showanimal>
        </div>
    </section>
@endsection
