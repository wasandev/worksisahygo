let mix = require('laravel-mix')

require('./nova.mix')

mix
  .setPublicPath('dist')
  .js('resources/js/card.js', 'js')
  .vue({ version: 3 })
  .nova('wasandev/araccount')
  .postCss('resources/css/card.css', 'css', [
    require("tailwindcss"),
  ])
