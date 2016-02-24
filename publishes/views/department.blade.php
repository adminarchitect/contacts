<div style="padding: 10px;">
    <h4>{{ $department->getTitle() }}</h4>

    <ul class="contacts__departments_list">
        <li>
            {{ $department->getDescription() }}
        </li>
        <li>
            <address>{{ $department->getAddress() }}</address>
        </li>
        @if ($phones = $department->getPhones())
            <li>
                <span>Phone: </span>
                {!! \contacts\list_phones($phones) !!}
            </li>
        @endif
        @if ($emails = $department->getEmails())
            <li>
                <span>Email: </span>
                {!! \contacts\list_emails($emails) !!}
            </li>
        @endif
    </ul>
</div>