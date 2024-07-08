# data-factory
Create post types, taxonomies from theme.json settings

# theme.json

Added config to theme.json to create post types or taxonomies

```
{
    "custom": {
        "post_types": [
            {
                "name": "Post type name",
                "singular_name": "Post type singular name",
                "type": "define post type here",
                "slug": "post type slug",
                "options": {
                }
            }
        ],
        "taxonomies": [
            {
                "name": "Taxonomy name",
                "singular_name": "Taxonomy singular name",
                "type": "define taxonomu here",
                "slug": "taxonomy slug",
                "options": {
                },
                "post_types": ["post-type-slug"]
            }
        ]
    }
}
```

