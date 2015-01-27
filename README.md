# zf2-tidy-filter
"Tidy" filter for Zend Framework 2

Usage in forms
--------------

Example form:

```php
<?php
namespace Application\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;

class ExampleForm extends ZendForm implements InputFilterProviderInterface
{
    function init()
    {
        $this->add([
            'name' => 'html',
            'type' => 'textarea',
        ]);
    }
    
    public function getInputFilterSpecification()
    {
        return [
            'html' => [
                'required' => true,
                'filters'  => [
                    ['name' => 'zf2filter\Filter\TidyFilter']
                ],
            ],
        ];
    }
}

```
