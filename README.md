# Admin Architect - Contacts module

`Note:` The backend part of this package can be used only in conjunction with `Admin Architect` (`terranet/administrator`) package.

## Installation

```
composer require adminarchitect/contacts
```

add service provider to `config/app.php`:

```
'providers' => [
    ...
    Terranet\Contacts\ServiceProvider::class
    ...
]
```

```
php artisan vendor:publish --provider="Terranet\\Contacts\\ServiceProvider"
```

## Usage

```
$contacts = new \Terranet\Contacts\Contacts;

$contacts
    ->setDescription('Terranet.md is a Web Development Company')
    ->setAddress('bd. Moscova 20/3, Chisinau, Moldova');
    
// optionally (in case then google maps geocoding unable to detect right location)
$contacts->setLocation(
    new \Terranet\Contacts\Location($lat, $lng)
);

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
```
