@section('contacts.markers')
    var markers = [];
    setTimeout(function() {
    @if ($location)
        markers.push(contacts_addMarker('{{ $description }}', {
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
                },
                streetViewControl: false
            });

            @yield('contacts.markers')
        }

        function contacts_addMarker(title, location) {
            var infowindow = new google.maps.InfoWindow({
                content: title
            });

            var marker = new google.maps.Marker({
                position: {
                    lat: location.lat,
                    lng: location.lng
                },
                map: contacts__map,
                title: title,
                animation: google.maps.Animation.DROP
            });

            marker.addListener('click', function() {
                infowindow.open(contacts__map, marker);
            });

            return marker;
        }
    </script>
@append