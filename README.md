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
$contacts = new Contacts('Google Inc.');
$contacts
    ->setDescription('<p>We’ve come a long way from the dorm room and the garage. </p>' .
        '<p>We moved into our headquarters in Mountain View, California—better known as the Googleplex—in 2004. </p>' .
        '<p>Today Google has more than 70 offices in more than 40 countries around the globe.</p>')
    ->setEmails(['info@google.com'])
    ->setPhones(['+1 734-332-6500', '+1 248-593-4000']);
    
$contacts->setAddress('1600 Amphitheatre Parkway Mountain View, CA 94043');

$contacts->department('Google Ann Arbor', function ($department) {
    $department->setDescription('Software development')
        ->setAddress('201 S. Division St. Suite 500 Ann Arbor, MI 48104')
        ->setPhones(['+1 734-332-6500'])
        ->setEmails(['support@google.com']);
});

$contacts->department('Google Detroit', function ($department) {
    $department->setDescription('Software development')
        ->setAddress('114 Willits Street Birmingham, MI 48009')
        ->setPhones(['+1 248-593-4000'])
        ->setEmails(['support@google.com']);
});

return $contacts->render();
```

# Result

![Contact page](./publishes/preview.png)