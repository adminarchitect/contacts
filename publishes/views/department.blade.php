<div style="padding: 10px;">
    <h4>{{ $department->getName() }}</h4>

    <ul>
        <li>
            {{ $department->getDescription() }}
        </li>
        <li>
            <span>Address: </span>{{ $department->getAddress() }}
        </li>
        @if ($emails = $department->getEmails())
            <li>
                <span>Email: </span>
                {!! join(', ', array_map(function ($email) {
                    return link_to('mailto:' . $email, $email);
                }, $emails)) !!}
            </li>
        @endif
        @if ($phones = $department->getPhones())
            <li>
                <span>Phone: </span>
                {!! join(', ', array_map(function ($phone) {
                    return link_to('tel:' . $phone, $phone);
                }, $phones)) !!}
            </li>
        @endif
    </ul>
</div>