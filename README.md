# blog-with-admin
Blog Website with Admin Portal

## Technologies Used

- PHP
- Docker
- MySQL (for database)
- HTML/CSS/JavaScript (for frontend)
- Composer (for dependency management)
- JWT (JSON Web Tokens) for authentication

## Prerequisites

Before running the application, ensure you have the following installed:

- Docker: [Installation Guide](https://docs.docker.com/get-docker/)
- Docker Compose: [Installation Guide](https://docs.docker.com/compose/install/)
- Composer: [Installation Guide](https://getcomposer.org/download/)
```
blog-with-admin
├─ admin-panel
│  ├─ composer.json
│  ├─ composer.lock
│  ├─ index.php
│  ├─ scripts
│  │  └─ compile_scss.php
│  ├─ src
│  │  ├─ assets
│  │  │  ├─ css
│  │  │  │  ├─ styles.css
│  │  │  │  └─ styles.scss
│  │  │  ├─ images
│  │  │  └─ js
│  │  │     └─ login.js
│  │  ├─ components
│  │  │  ├─ Footer.php
│  │  │  ├─ Header.php
│  │  │  └─ Navigation.php
│  │  ├─ pages
│  │  │  ├─ DashboardContent.php
│  │  │  └─ LoginForm.php
│  │  └─ views
│  │     └─ Content.php
│  └─ vendor
│     ├─ autoload.php
│     ├─ bin
│     │  ├─ pscss
│     │  └─ pscss.bat
│     ├─ composer
│     │  ├─ autoload_classmap.php
│     │  ├─ autoload_namespaces.php
│     │  ├─ autoload_psr4.php
│     │  ├─ autoload_real.php
│     │  ├─ autoload_static.php
│     │  ├─ ClassLoader.php
│     │  ├─ installed.json
│     │  ├─ installed.php
│     │  ├─ InstalledVersions.php
│     │  ├─ LICENSE
│     │  └─ platform_check.php
│     ├─ firebase
│     │  └─ php-jwt
│     │     ├─ composer.json
│     │     ├─ LICENSE
│     │     ├─ phpunit.xml.dist
│     │     ├─ README.md
│     │     ├─ src
│     │     │  ├─ BeforeValidException.php
│     │     │  ├─ ExpiredException.php
│     │     │  ├─ JWK.php
│     │     │  ├─ JWT.php
│     │     │  ├─ Key.php
│     │     │  └─ SignatureInvalidException.php
│     │     └─ tests
│     │        ├─ autoload.php.dist
│     │        ├─ bootstrap.php
│     │        ├─ ecdsa-private.pem
│     │        ├─ ecdsa-public.pem
│     │        ├─ ecdsa384-private.pem
│     │        ├─ ecdsa384-public.pem
│     │        ├─ ed25519-1.pub
│     │        ├─ ed25519-1.sec
│     │        ├─ JWKTest.php
│     │        ├─ JWTTest.php
│     │        ├─ rsa-jwkset.json
│     │        ├─ rsa-with-passphrase.pem
│     │        ├─ rsa1-private.pem
│     │        ├─ rsa1-public.pub
│     │        └─ rsa2-private.pem
│     └─ scssphp
│        └─ scssphp
│           ├─ .editorconfig
│           ├─ bin
│           │  └─ pscss
│           ├─ composer.json
│           ├─ docs
│           │  ├─ .bundle
│           │  │  └─ config
│           │  ├─ community
│           │  │  └─ README.md
│           │  ├─ css
│           │  │  └─ main.scss
│           │  ├─ docs
│           │  │  ├─ changelog.md
│           │  │  ├─ extending
│           │  │  │  ├─ custom-functions.md
│           │  │  │  ├─ importers.md
│           │  │  │  ├─ logger.md
│           │  │  │  ├─ preset-variables.md
│           │  │  │  ├─ README.md
│           │  │  │  └─ values.md
│           │  │  ├─ README.md
│           │  │  └─ server.md
│           │  ├─ favicon.ico
│           │  ├─ Gemfile
│           │  ├─ img
│           │  │  └─ tile.png
│           │  ├─ Makefile
│           │  ├─ README.md
│           │  ├─ _config.yml
│           │  ├─ _includes
│           │  │  ├─ footer.html
│           │  │  ├─ head.html
│           │  │  └─ header.html
│           │  ├─ _layouts
│           │  │  └─ default.html
│           │  └─ _sass
│           │     ├─ _leafo.scss
│           │     └─ _rouge.scss
│           ├─ LICENSE.md
│           ├─ MAINTENANCE.md
│           ├─ Makefile
│           ├─ phpcs.xml.dist
│           ├─ phpstan-baseline.neon
│           ├─ phpstan-no-baseline.neon
│           ├─ phpstan.neon
│           ├─ phpunit.xml.dist
│           ├─ README.md
│           ├─ scss.inc.php
│           ├─ src
│           │  ├─ Base
│           │  │  └─ Range.php
│           │  ├─ Block
│           │  │  ├─ AtRootBlock.php
│           │  │  ├─ CallableBlock.php
│           │  │  ├─ ContentBlock.php
│           │  │  ├─ DirectiveBlock.php
│           │  │  ├─ EachBlock.php
│           │  │  ├─ ElseBlock.php
│           │  │  ├─ ElseifBlock.php
│           │  │  ├─ ForBlock.php
│           │  │  ├─ IfBlock.php
│           │  │  ├─ MediaBlock.php
│           │  │  ├─ NestedPropertyBlock.php
│           │  │  └─ WhileBlock.php
│           │  ├─ Block.php
│           │  ├─ Cache.php
│           │  ├─ Colors.php
│           │  ├─ CompilationResult.php
│           │  ├─ Compiler
│           │  │  ├─ CachedResult.php
│           │  │  └─ Environment.php
│           │  ├─ Compiler.php
│           │  ├─ Exception
│           │  │  ├─ CompilerException.php
│           │  │  ├─ ParserException.php
│           │  │  ├─ RangeException.php
│           │  │  ├─ SassException.php
│           │  │  ├─ SassScriptException.php
│           │  │  └─ ServerException.php
│           │  ├─ Formatter
│           │  │  ├─ Compact.php
│           │  │  ├─ Compressed.php
│           │  │  ├─ Crunched.php
│           │  │  ├─ Debug.php
│           │  │  ├─ Expanded.php
│           │  │  ├─ Nested.php
│           │  │  └─ OutputBlock.php
│           │  ├─ Formatter.php
│           │  ├─ Logger
│           │  │  ├─ LoggerInterface.php
│           │  │  ├─ QuietLogger.php
│           │  │  └─ StreamLogger.php
│           │  ├─ Node
│           │  │  └─ Number.php
│           │  ├─ Node.php
│           │  ├─ OutputStyle.php
│           │  ├─ Parser.php
│           │  ├─ SourceMap
│           │  │  ├─ Base64.php
│           │  │  ├─ Base64VLQ.php
│           │  │  └─ SourceMapGenerator.php
│           │  ├─ Type.php
│           │  ├─ Util
│           │  │  └─ Path.php
│           │  ├─ Util.php
│           │  ├─ ValueConverter.php
│           │  ├─ Version.php
│           │  └─ Warn.php
│           ├─ tests
│           │  ├─ ApiTest.php
│           │  ├─ Base64VLQTest.php
│           │  ├─ compare-scss.sh
│           │  ├─ CompilerTest.php
│           │  ├─ CompressedTest.php
│           │  ├─ ExceptionTest.php
│           │  ├─ FrameworkTest.php
│           │  ├─ inputs
│           │  │  ├─ at_root.scss
│           │  │  ├─ at_root_in_nested_mixin.scss
│           │  │  ├─ builtins.scss
│           │  │  ├─ color_operators.scss
│           │  │  ├─ comments.scss
│           │  │  ├─ comment_incomplete_interpolation.scss
│           │  │  ├─ compass_extract.scss
│           │  │  ├─ content.scss
│           │  │  ├─ content_with_function.scss
│           │  │  ├─ counter.scss
│           │  │  ├─ custom_properties.scss
│           │  │  ├─ default_args.scss
│           │  │  ├─ directives.scss
│           │  │  ├─ empty_fallback_var.scss
│           │  │  ├─ empty_fallback_var_imports
│           │  │  │  └─ plain.css
│           │  │  ├─ empty_var_fallback_mixed_case.scss
│           │  │  ├─ extending_compound_selector.scss
│           │  │  ├─ extending_is_selector.scss
│           │  │  ├─ extends.scss
│           │  │  ├─ extends_nesting.scss
│           │  │  ├─ filter_effects.scss
│           │  │  ├─ functions.scss
│           │  │  ├─ ie7.scss
│           │  │  ├─ if.scss
│           │  │  ├─ if_on_null.scss
│           │  │  ├─ import.scss
│           │  │  ├─ imports
│           │  │  │  ├─ partial.css
│           │  │  │  ├─ plain.css
│           │  │  │  ├─ simple.css
│           │  │  │  ├─ simple.scss
│           │  │  │  └─ _partial.scss
│           │  │  ├─ interpolation.scss
│           │  │  ├─ keyword_args.scss
│           │  │  ├─ list.scss
│           │  │  ├─ looping.scss
│           │  │  ├─ map.scss
│           │  │  ├─ map_iteration_types.scss
│           │  │  ├─ media.scss
│           │  │  ├─ media_query_interpolation_spaces.scss
│           │  │  ├─ mixins.scss
│           │  │  ├─ mix_unitless_weight.scss
│           │  │  ├─ nested_mixins.scss
│           │  │  ├─ nesting.scss
│           │  │  ├─ null.scss
│           │  │  ├─ operators.scss
│           │  │  ├─ parsing_comments.scss
│           │  │  ├─ placeholder_selector.scss
│           │  │  ├─ rgb_rgba.scss
│           │  │  ├─ rgb_trailing_comma.scss
│           │  │  ├─ scss_css.scss
│           │  │  ├─ selectors.scss
│           │  │  ├─ selector_functions.scss
│           │  │  ├─ shorthand.scss
│           │  │  ├─ short_circuit.scss
│           │  │  ├─ string_escaping.scss
│           │  │  ├─ supports.scss
│           │  │  ├─ values.scss
│           │  │  └─ variables.scss
│           │  ├─ InputTest.php
│           │  ├─ outputs
│           │  │  ├─ at_root.css
│           │  │  ├─ at_root_in_nested_mixin.css
│           │  │  ├─ builtins.css
│           │  │  ├─ color_operators.css
│           │  │  ├─ comments.css
│           │  │  ├─ comment_incomplete_interpolation.css
│           │  │  ├─ compass_extract.css
│           │  │  ├─ content.css
│           │  │  ├─ content_with_function.css
│           │  │  ├─ counter.css
│           │  │  ├─ custom_properties.css
│           │  │  ├─ default_args.css
│           │  │  ├─ directives.css
│           │  │  ├─ empty_fallback_var.css
│           │  │  ├─ empty_var_fallback_mixed_case.css
│           │  │  ├─ extending_compound_selector.css
│           │  │  ├─ extending_is_selector.css
│           │  │  ├─ extends.css
│           │  │  ├─ extends_nesting.css
│           │  │  ├─ filter_effects.css
│           │  │  ├─ functions.css
│           │  │  ├─ ie7.css
│           │  │  ├─ if.css
│           │  │  ├─ if_on_null.css
│           │  │  ├─ import.css
│           │  │  ├─ interpolation.css
│           │  │  ├─ keyword_args.css
│           │  │  ├─ list.css
│           │  │  ├─ looping.css
│           │  │  ├─ map.css
│           │  │  ├─ map_iteration_types.css
│           │  │  ├─ media.css
│           │  │  ├─ media_query_interpolation_spaces.css
│           │  │  ├─ mixins.css
│           │  │  ├─ mix_unitless_weight.css
│           │  │  ├─ nested_mixins.css
│           │  │  ├─ nesting.css
│           │  │  ├─ null.css
│           │  │  ├─ operators.css
│           │  │  ├─ parsing_comments.css
│           │  │  ├─ placeholder_selector.css
│           │  │  ├─ rgb_rgba.css
│           │  │  ├─ rgb_trailing_comma.css
│           │  │  ├─ scss_css.css
│           │  │  ├─ selectors.css
│           │  │  ├─ selector_functions.css
│           │  │  ├─ shorthand.css
│           │  │  ├─ short_circuit.css
│           │  │  ├─ string_escaping.css
│           │  │  ├─ supports.css
│           │  │  ├─ values.css
│           │  │  └─ variables.css
│           │  ├─ SassSpecTest.php
│           │  ├─ specs
│           │  │  ├─ sass-spec-exclude-warning.txt
│           │  │  └─ sass-spec-exclude.txt
│           │  └─ Util
│           │     └─ PathTest.php
│           └─ vendor-bin
│              └─ phpstan
│                 └─ composer.json
├─ api
│  ├─ composer.json
│  ├─ config
│  │  └─ database.php
│  ├─ controllers
│  │  ├─ CommentController.php
│  │  ├─ PostController.php
│  │  └─ UserController.php
│  ├─ helpers
│  │  └─ AuthHelper.php
│  ├─ index.php
│  └─ models
│     ├─ Comment.php
│     ├─ Post.php
│     └─ User.php
├─ docker-compose.yml
├─ Dockerfile
├─ frontend
│  ├─ composer.json
│  ├─ index.php
│  ├─ scripts
│  │  └─ compile_scss.php
│  └─ src
│     ├─ assets
│     │  ├─ css
│     │  │  ├─ styles.css
│     │  │  └─ styles.scss
│     │  ├─ images
│     │  └─ js
│     ├─ controllers
│     ├─ models
│     └─ views
├─ README.md
└─ sql
   └─ init.sql

```