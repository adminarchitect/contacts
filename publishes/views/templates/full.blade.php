@extends('contacts::layout')


@section('contacts.content')
    <div class="contacts__title">Contact Us</div>

    @include('contacts::header')

    <div class="contacts__map-container">
        <div id="contacts__map" class="contacts__full_map"></div>
        @if (($departments = $contacts->departments()) && $departments->count())
            <div class="contacts__departments">
                <h4>Departments</h4>

                <div class="text-left">
                    @each('contacts::department', $departments, 'department')
                </div>
            </div>
        @endif
    </div>
@append

@include('contacts::js')