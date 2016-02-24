@extends('contacts::layout')

@section('contacts.content')
    <div class="contacts__title">Contact Us</div>

    @include('contacts::header')

    <div class="row">
        <div class="col-lg-12" id="contacts__map"></div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if (($departments = $contacts->departments()) && $departments->count())
                <div>
                    <h4>Departments</h4>

                    <div class="text-left two-rows">
                        @each('contacts::department', $departments, 'department')
                    </div>
                </div>
            @endif
        </div>
    </div>
@append

@include('contacts::js')