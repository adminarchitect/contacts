@if ($title = $contacts->getTitle())
    <h2>{!! $title !!}</h2>
@endif

@if ($description = $contacts->getDescription())
    <div class="well">{!! $description !!}</div>
@endif

@if ($address = $contacts->getAddress())
    <address>{{ $address }}</address>
@endif

@if ($phones = $contacts->getPhones())
    <p>
        <span>Phone: </span>
        {!! \contacts\list_phones($phones) !!}
    </p>
@endif

@if ($emails = $contacts->getEmails())
    <p>
        <span>Email: </span>
        {!! \contacts\list_emails($emails) !!}
    </p>
@endif