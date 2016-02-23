@extends('contacts::layout')

@section('contacts.content')
    <div class="contacts__title">Contact Us</div>

    @if ($about)
        <p>{{ $about }}</p>
    @endif

    @if ($address)
        <address class="well">{{ $address }}</address>
    @endif

    <div class="row">
        <div class="col-lg-4">
            @if ($departments->count())
                <div class="contacts__departments">
                    <h4>Departments</h4>

                    <div class="text-left">
                        @each('contacts::department', $departments, 'department')
                    </div>
                </div>
            @endif
        </div>
        <div class="col-lg-8" id="contacts__map"></div>
    </div>
@append

@section('contacts.markers')
    var markers = [];
    setTimeout(function() {
    @if ($location)
        markers.push(contacts_addMarker('{{ $about }}', {
        lat: {{ $location->getLat() }},
        lng: {{ $location->getLng() }}
        }));
    @endif

    @foreach($departments as $dep)
        @if ($l = $dep->getLocation())
            markers.push(contacts_addMarker('{{ $dep->getDescription() }}', {
            lat: {{ $l->getLat() }},
            lng: {{ $l->getLng() }}
            }));
        @endif
    @endforeach

    @if (config('contacts.map.fitBounds'))
        fitBounds();
    @endif
    }, 700);

    function fitBounds()
    {
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0; i < markers.length; i++) {
    bounds.extend(markers[i].getPosition());
    }

    contacts__map.setCenter(bounds.getCenter());

    contacts__map.fitBounds(bounds);
    };

@endsection

@section('contacts.initJS')
    <script type="text/javascript">
        var contacts__map;
        function contacts__initMap() {
            contacts__map = new google.maps.Map(document.getElementById('contacts__map'), {
                center: {
                    lat: {{config('contacts.map.center.lat')}},
                    lng: {{config('contacts.map.center.lng')}}
                },
                zoom: {{config('contacts.map.zoom', 8)}},
                mapTypeControl: false,
                zoomControl: true,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_TOP
                }
            });

            @yield('contacts.markers')

            //contacts__map.
        }

        function contacts_addMarker(title, location) {
            return new google.maps.Marker({
                position: {
                    lat: location.lat,
                    lng: location.lng
                },
                map: contacts__map,
                title: title,
                animation: google.maps.Animation.DROP
            });
        }
    </script>
@append