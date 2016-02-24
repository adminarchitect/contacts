<?php

namespace contacts {
    function list_emails($emails)
    {
        return join(', ', array_map(function ($email) {
            return link_to('mailto:' . $email, $email);
        }, $emails));
    }
    
    function list_phones($phones)
    {
        return join(', ', array_map(function ($phone) {
            return link_to('tel:' . $phone, $phone);
        }, $phones));
    }
}