@extends('layouts.app')


@section('content')
    <section class="section has-background-success">
        <div class="container">
            <h1>Edit species</h1>
            <createspecies :is-editable="true" :current-species="{{ $species }}"></createspecies>
        </div>
    </section>
@endsection
