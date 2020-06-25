@extends('layouts.app')


@section('content')
    <section class="section has-background-success">
        <div class="container">
            <!--<h1>Show animal</h1>-->
            <showanimal :current-animal="{{ $animal }}"></showanimal>
        </div>
    </section>
@endsection
