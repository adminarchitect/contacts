<?php

use Terranet\Contacts\Contacts;
use Terranet\Contacts\Department;

Route::get('contact', function () {
    $contacts = new Contacts;

    $contacts
        ->setAbout('Terranet.md is a Web Development Company')
        ->setAddress('bd. Moscova 20/3, Chisinau, Moldova');

    $contacts->department('Sales department', function (Department $department) {
        $department->setDescription('Terranet.md Sales')
            ->setAddress('bd. Moscova 20/3, Chisinau, Moldova')
            ->setPhones(['+37322493866'])
            ->setEmails(['endi1982@gmail.com']);
    });

    $contacts->department('Development department', function (Department $department) {
        $department->setDescription('Terranet.md Development')
            ->setAddress('Moldova, Chisinau, bd. Moscovei 17/2, fl. 3')
            ->setPhones(['+37322493866'])
            ->setEmails(['endi1982@gmail.com'])
            ->setLocation(new \Terranet\Contacts\Location('40.61707760000000', '-73.95530950000000'));
    });

    return $contacts->render();
});