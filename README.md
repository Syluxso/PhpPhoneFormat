# PhpPhoneFormat
The goals of this library are:
- Clean a string and make it a valid phone number if possible.
- Format valid phone numbers into many display formats automatically.
- Provide true/false for if the string is a valid phone number.
- Break the phone into an array
- Remove preceeding "+" and/or "1". They will be added back in again if the phone is valid.

This library is designed for USA phone formatting.

#### Example: Valid 10 digit phone
```php
$phone = new PhoneFormat('5555555555');

// Object example
{
  $phone->clean: 5555555555
  $phone->string: "5555555555"
  $phone->dashes: "555-555-5555"
  $phone->brackets: "(555) 555-5555"
  $phone->brackets_alt: "(555) 555 - 5555"
  $phone->spaces: "555 555 5555"
  $phone->dots: "555.555.5555"
  $phone->with_code_plus: "+15555555555"
  $phone->with_code_no_plus: "15555555555"
  $phone->array: [
    0 => "5",
    1 => "5",
    2 => "5",
    3 => "5",
    4 => "5",
    5 => "5",
    6 => "5",
    7 => "5",
    8 => "5",
    9 => "5",
  ]
  $phone->error: false
  $phone->valid: true
}
```

#### Example: Valid 10 digit phone but starts with "+1", "+" or "1".
```php
$phone = new PhoneFormat('+15555555555');

// Object example
{
  $phone->clean: 5555555555
  $phone->string: "5555555555"
  $phone->dashes: "555-555-5555"
  $phone->brackets: "(555) 555-5555"
  $phone->brackets_alt: "(555) 555 - 5555"
  $phone->spaces: "555 555 5555"
  $phone->dots: "555.555.5555"
  $phone->with_code_plus: "+15555555555"
  $phone->with_code_no_plus: "15555555555"
  $phone->array: [
    0 => "5",
    1 => "5",
    2 => "5",
    3 => "5",
    4 => "5",
    5 => "5",
    6 => "5",
    7 => "5",
    8 => "5",
    9 => "5",
  ]
  $phone->error: false
  $phone->valid: true
}
```

#### Example: Invalid phone number
```php
$phone = new PhoneFormat('1555555555');

// Object example
{
  $phone->clean: null
  $phone->dashes: null
  $phone->brackets: null
  $phone->brackets_alt: null
  $phone->spaces: null
  $phone->dots: null
  $phone->with_code_plus: null
  $phone->with_code_no_plus: null
  $phone->string: "1555555555"
  $phone->array: [
    0 => "5"
    1 => "5"
    2 => "5"
    3 => "5"
    4 => "5"
    5 => "5"
    6 => "5"
    7 => "5"
    8 => "5"
  ]
  $phone->error: array:2 [
    0 => "Phone numbers must be 10 characters."
    1 => "Not a valid US phone number."
  ]
  $phone->valid: false
}
```


