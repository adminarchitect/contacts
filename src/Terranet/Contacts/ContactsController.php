<?php

namespace Terranet\Contacts;

use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function index(Contacts $contacts)
    {
        $contacts
            ->setDescription('Terranet.md is a Web Development Company')
            ->setAddress('bd. Moscova 20/3, Chisinau, Moldova');

        $contacts->department('Sales department', function (Department $department) {
            $department->setDescription('Terranet.md Sales')
                ->setAddress('bd. Moscova 20/3, Chisinau, Moldova')
                ->setPhones(['+37322493866'])
                ->setEmails(['endi1982@gmail.com']);
        });

        $contacts->department('Development department', function (Department $department) {
            $department->setDescription('Terranet.md Development')
                ->setAddress('bd. Moscova 14/1, Chisinau, Moldova')
                ->setPhones(['+37322493866'])
                ->setEmails(['endi1982@gmail.com', 'endi@terranet.md']);
        });

        return $contacts->render();
    }
}
