
# Wuffi - Gutenberg Patterns

A quick guide on how to create predefined patterns for the Gutenberg editor i WordPress.



## Registering the block pattern

```php
function wuffi_hero_component() {
    register_block_pattern(
        'wuffi-patterns/PATTERN_NAME',
        array(
            'title'       => __('TITLE', 'wuffi'),
            'description' => _x('DESCRIPTION', 'wuffi'),
            'content'     => "ESCAPED CONTENT HERE",
            'categories'  => array('hero'),
        )
    );

}    
add_action('init', 'wuffi_hero_component');
```


## Where to add this code

The code above must be added to a new file (named conveniently after the pattern). Eg. if your pattern is named "hero" - please name the file "hero.php". 
When the file is created, it must be stored in the ```/patterns``` folder within the theme.

Example on the file structure:

```
/muffi-wp (theme folder)
- /patterns
-- hero.php
```

