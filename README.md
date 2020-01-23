## CMP WP

### Setup

1. From root directory: `composer install`
1. Add Advanced Custom Fields Pro to `wp-content/plugins` folder
1. From theme directory: `composer install`
1. From theme directory: `npm install`
1. From root directory: `docker-compose up -d`
1. Open up http://localhost:8000 and set up a generic WordPress install
1. Activate All-in-One migration plugin
1. Import production database
1. From theme directory: `yarn` and then `yarn run start`

## Sass

1. Delete or Remove the mixin.sass file from `node_modules/object-fit-images/preprocessors/mixin.sass` to compile .scss files. Not removing this will give you errors if one tries to run any sass commands.
2. From `/cmp-wp/wp-content/themes/cmp/assets/styles` run `sass all.scss:output.css` to compile the sass.
