Collection with WSFormBundle
==================================

You may probably read the article in the officiel documentation: [How to Embed a Collection of Forms](http://symfony.com/doc/current/cookbook/form/form_collections.html).
The WSFormBundle can easily handle this case in forms by adding [jQuery](http://jquery.com/) functions.

I will use the context of the `How to Embed a Collection of Forms` article.

## Entities

Same entities then the article.

## FormTypes

``` php
<?php
// src/Acme/TaskBundle/Form/Type/TagType.php
namespace Acme\TaskBundle\Form\Type;

class TagType extends AbstractType
{
    // add this function to your TagType class
    public function getParent() {
		return 'ws_collection_item';
	}
}
```

``` php
<?php
// src/Acme/TaskBundle/Form/Type/TaskType.php
namespace Acme\TaskBundle\Form\Type;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	// Remove this line from your TaskType
        $builder->add('tags', 'collection', array('type' => new TagType()));
        
        // and replace it by this one
        $builder->add('priceOnes', 'ws_collection', array('type' => new TagType());
    }
}
```

## Views

Add the following lines to your form view files:

``` html+jinja

{{ form_javascript(form) }}
{{ ws_js() }}

```

## Requires

You need to use jQuery and twitter bootstrap with the default system. I will add a facility
for overriding templates in a future version.
