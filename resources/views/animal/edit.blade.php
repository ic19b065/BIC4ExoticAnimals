@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <h1>Edit animal</h1>
            <createanimal :is-editable="true" :current-animal="{{ $animal }}"></createanimal>
        </div>
    </section>
@endsection
