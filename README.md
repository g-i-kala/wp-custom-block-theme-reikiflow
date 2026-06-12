# ReikiFlow

ReikiFlow is a custom WordPress block theme built for a clean, flexible, and modern editing experience in the Site Editor.

It provides a lightweight design system, reusable patterns, and custom theme styling for creating structured pages quickly and consistently.

## Features

- WordPress block theme architecture
- Full Site Editing support
- Custom patterns for reusable layouts
- Custom typography, spacing, and color system
- Responsive header and footer layouts
- Polylang language switch support
- WS Form integration
- Theme-driven styling for buttons, navigation, forms, and footer sections
- Ready for custom block extensions and reusable content systems

## Dependencies

ReikiFlow is designed to work with the following plugins and components:

- **ACF Free**
- **WS Form**
- **Polylang**
- **KC Single Testimonial** block plugin
- **KC Testimonials Grid** block plugin

The testimonial blocks are maintained separately and can be installed from their Git repositories.

## Requirements

- WordPress 6.8 or newer
- PHP 7.4 or newer
- A block-compatible theme environment

## Installation

1. Upload the theme folder to:
   `wp-content/themes/reikiflow`
2. Activate the theme in the WordPress admin
3. Install and activate the required plugins listed above
4. Open the Site Editor to customize templates, template parts, patterns, and global styles

## Theme structure

Typical structure:

```text
reikiflow/
├── assets/
│   ├── css/
│   ├── dist/
│   ├── fonts/
│   └── js/
├── blocks/
├── inc/
├── parts/
├── patterns/
├── templates/
├── functions.php
├── style.css
├── theme.json
└── readme.md
```

## Included functionality

ReikiFlow includes support for:

- custom block patterns
- custom block registration
- newsletter form styling
- language switch handling
- testimonial content and presentation
- reusable footer and header sections
- custom block styles for buttons, lists, and layout helpers

## Patterns

The theme includes reusable patterns for sections such as:
- hero sections
- two-column content
- centered wrappers
- content grids
- footer and layout sections

Patterns are intended to speed up page building and keep the design consistent.

## Custom blocks

The theme works with custom blocks for reusable, structured components such as:
- testimonial cards
- testimonial grids
- section wrappers

## Styling

ReikiFlow uses:

- theme.json for design tokens, typography, spacing, color palette, and block defaults
- style.css or theme CSS for layout, component styling, and overrides

The theme also includes custom styling for:
- navigation
- footer
- buttons
- forms
- language switcher
- testimonial layouts
- newsletter form presentation

## Plugins

ReikiFlow is built to work well with:
- Polylang
- WS Form
- ACF Free
- custom block plugins

## Development

If the project includes a build process, run:

```bash

Apply ...```
npm install
npm start
``` 

For a production build:

```bash
npm run build
```

## Notes

- ReikiFlow is intended as a flexible base for custom page builds.
- Keep reusable content components in plugins when appropriate.
- Use patterns for reusable section layouts.
- Use theme.json to control the design system consistently.
- Use custom blocks for reusable components that need editor controls or dynamic rendering.

## License

GNU General Public License v2 or later

## Author

karo_ej
K::C KaroCreativeDesigns
karocreative.pl
karocreativedesings@gmail.com


