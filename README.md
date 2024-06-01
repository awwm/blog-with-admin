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
├─ .git
│  ├─ COMMIT_EDITMSG
│  ├─ config
│  ├─ description
│  ├─ FETCH_HEAD
│  ├─ HEAD
│  ├─ hooks
│  │  ├─ applypatch-msg.sample
│  │  ├─ commit-msg.sample
│  │  ├─ fsmonitor-watchman.sample
│  │  ├─ post-update.sample
│  │  ├─ pre-applypatch.sample
│  │  ├─ pre-commit.sample
│  │  ├─ pre-merge-commit.sample
│  │  ├─ pre-push.sample
│  │  ├─ pre-rebase.sample
│  │  ├─ pre-receive.sample
│  │  ├─ prepare-commit-msg.sample
│  │  ├─ push-to-checkout.sample
│  │  ├─ sendemail-validate.sample
│  │  └─ update.sample
│  ├─ index
│  ├─ info
│  │  └─ exclude
│  ├─ logs
│  │  ├─ HEAD
│  │  └─ refs
│  │     ├─ heads
│  │     │  └─ main
│  │     └─ remotes
│  │        └─ origin
│  │           ├─ HEAD
│  │           └─ main
│  ├─ objects
│  │  ├─ 01
│  │  │  └─ 902f3de34fc48cfd1a36aaad2f0e769e7df029
│  │  ├─ 03
│  │  │  └─ c1fbd1fa9d0bb1b5aa93008ec738d2a6a38254
│  │  ├─ 07
│  │  │  ├─ 832956c6442b774347d5cb6d2f9ef812c5ce79
│  │  │  ├─ f7ad71403fcd0258e19d8e36f038ce23feb6ae
│  │  │  └─ feb90d44cb29cfe428cafbd19ccf524c6bafaa
│  │  ├─ 09
│  │  │  ├─ 789461f51b5f3169bb89dcffb6df36390d47a3
│  │  │  └─ bed32fe8d5af21ee3ddbf70d3b4a99b36d1e58
│  │  ├─ 0c
│  │  │  └─ 3a380da19c2c428f8a1ab6c6453d3b585f6124
│  │  ├─ 0d
│  │  │  └─ 38e84435c987b7f88ecc0f2e3a01ce44ed30de
│  │  ├─ 0e
│  │  │  ├─ 8efa7fcf37df6b2cacd635b51586e0e800bc1d
│  │  │  └─ e6fb46516e486c5ec52e5ac517821e9161a7c2
│  │  ├─ 14
│  │  │  └─ 8434ab2b79ce2c0cde438b765f789881bc0794
│  │  ├─ 17
│  │  │  ├─ 55c5e230336d4edc84a7367b7c0efa370faa1d
│  │  │  └─ f1016dcc929b307bdafa9ba679bc7754496a0b
│  │  ├─ 18
│  │  │  └─ 36cc266901bec8639b27fca06c17a82db5d1a7
│  │  ├─ 19
│  │  │  └─ 01d9553ec8672d81b61418b9c460a3ed27ab74
│  │  ├─ 1b
│  │  │  └─ eb655e00f2688ac21eaddcaa34c16ba3268dea
│  │  ├─ 1c
│  │  │  ├─ 29c18824e052b4ae7f7735416f00d5d6565baf
│  │  │  └─ d90fe7dac2987ef8da3b519a90e97375501b09
│  │  ├─ 1f
│  │  │  └─ a17dbc88fffddfed5af60982421b9013afd20c
│  │  ├─ 20
│  │  │  ├─ ad1b95e3a185a35faf4c057cc520f30d331f63
│  │  │  └─ ef093986c66b95db0f75d0b4b6c38dd2de2e7e
│  │  ├─ 21
│  │  │  └─ 97bb10bb297eb06207847460682e94b380ea91
│  │  ├─ 22
│  │  │  └─ b58681d54dd497e02757685c5a04c4037c37d9
│  │  ├─ 23
│  │  │  ├─ 9a2a62945943d6dad212ad05e39ee3b5ec56d3
│  │  │  └─ c92a26828a25d2042d5d68d369032684310122
│  │  ├─ 24
│  │  │  └─ dac37294602646c5124861705699e172f6b3af
│  │  ├─ 25
│  │  │  └─ 7b94928c7497e5e0b3dc5e4d5e6deaf1b243ef
│  │  ├─ 26
│  │  │  └─ 68fa9228e9ce0e0042b606f698b44ea8cea7f2
│  │  ├─ 27
│  │  │  └─ 4bfdfc6eeda8910441c46480d207a82e86fa45
│  │  ├─ 28
│  │  │  └─ 1f36b18bf5402380d7ff7765116aef3d48e505
│  │  ├─ 2c
│  │  │  └─ bd806d63773b2d3cbd7c3100e008d6b652b025
│  │  ├─ 2e
│  │  │  └─ 097bc200afbd4f6926499b9c5aff30f7a25088
│  │  ├─ 31
│  │  │  └─ 86b369a35fc3dd725163e35f7ae2f9426e2de2
│  │  ├─ 32
│  │  │  └─ fbac397cf6b9b4aded7c58c797318f97198614
│  │  ├─ 34
│  │  │  ├─ 38ec9c0353e1ecdbbd0832880daa7497f2114b
│  │  │  └─ e3e3d37155e17c80c0290c7bb449369c92f60c
│  │  ├─ 3a
│  │  │  └─ 62b33cae837308c6ba18fa1ede646bf168d20c
│  │  ├─ 3d
│  │  │  └─ 63137bee0db85775bc8602c1962969cc07db62
│  │  ├─ 3e
│  │  │  ├─ 33d992995c55681cb68f2dd024ff5847673d0e
│  │  │  └─ ce4fda9a39124e11922a07cc594bf041a4f3fe
│  │  ├─ 40
│  │  │  └─ cbe28ab7a0e72d960710824e3d6045c6ca184f
│  │  ├─ 42
│  │  │  └─ cd895f7c76f556247997db681b1141a85acd31
│  │  ├─ 43
│  │  │  ├─ 11193aabd293607528328c9966469cc024b51d
│  │  │  └─ b8c40a93204eebdefde7939d2bd6a2f81fe343
│  │  ├─ 47
│  │  │  └─ e40a438573c99bbef8f649692fc1dd558f3d4e
│  │  ├─ 49
│  │  │  └─ c71f155dbe6fbe26785a0d788338ebf8d3a62a
│  │  ├─ 4a
│  │  │  └─ 50142398d9b17b7464afff51695fbefea76c13
│  │  ├─ 4d
│  │  │  └─ bd457fe602b36a50654386afd6472f1a330614
│  │  ├─ 4e
│  │  │  ├─ 24d0400bf1aebb49ce25722d50c61c97f1a8b3
│  │  │  └─ 94869d8f91c6817eaa101e76a2f853efcffd44
│  │  ├─ 53
│  │  │  └─ 35503bd6c81e670a70746595cd1bc1b9ebe598
│  │  ├─ 57
│  │  │  └─ 5d8159bbb6d712cca1ce85e07be4d5f514b3f0
│  │  ├─ 58
│  │  │  ├─ 12caddc993005add85a3262836a2175387ca12
│  │  │  └─ 277e0409b5bd71298ed17a16b66ebbc9b8d4c6
│  │  ├─ 5b
│  │  │  └─ e881558d7c04b748f9d521b897e539b00066e1
│  │  ├─ 5c
│  │  │  ├─ 15a99ffacbe23740c4b27cabc1df33988b3b86
│  │  │  ├─ 5371473e1899bcccc128cb3e7619f33aee5b5b
│  │  │  └─ 5532659be5e0e9ba2ee3a2ee8b2db88f99ae88
│  │  ├─ 5d
│  │  │  └─ dfd1a3609608358d40e8771d130e8ce066a471
│  │  ├─ 5e
│  │  │  └─ e5bba8e0565aab63d2527b05278d8e47c91025
│  │  ├─ 5f
│  │  │  ├─ 65bf9a07eff97ab5b2b97b2e152c998a235bdf
│  │  │  └─ 9ce0055287f1f1232497bd8e999c6b861a976c
│  │  ├─ 60
│  │  │  └─ b4f4cb560f474db6248daaae3e15409cf9fbc5
│  │  ├─ 62
│  │  │  └─ 847107868651a61c108f8f1e9b93d5bae24acf
│  │  ├─ 63
│  │  │  └─ 53efee3c99e3bcf6689fbe299452680fb9739d
│  │  ├─ 65
│  │  │  ├─ c0b36f42c05fa436f5f3201d2c1bb82e6b36cf
│  │  │  └─ f7fabb34aab2d252486e055c35a08dab7347e0
│  │  ├─ 66
│  │  │  └─ e07f5d7838cd93c24311c34dfe0f548e02e467
│  │  ├─ 67
│  │  │  └─ 047e2fb27959ca98ec7b25836a8a55cf8cae6e
│  │  ├─ 68
│  │  │  └─ c2c1de0370588a1aaaa621d06ce332c4ba44e8
│  │  ├─ 6c
│  │  │  └─ b33b4a3e284f7b372142236b12f84859d2e4ff
│  │  ├─ 6d
│  │  │  └─ c057bdea33a38a0325a1a7803c2152e8e38e15
│  │  ├─ 70
│  │  │  └─ 8e27bdbab0d622d3ea56f3dbe7a58c34168cd2
│  │  ├─ 71
│  │  │  └─ 748b6e14cd0164234d2c53d0ed7bca13121e10
│  │  ├─ 73
│  │  │  └─ 015ec64375c4f0e57048ca95fd0c513fd4c581
│  │  ├─ 76
│  │  │  └─ 4306c5459ed292c734b7ee44749a5efe7d359a
│  │  ├─ 77
│  │  │  ├─ 2ce879d905c7f631ce38249e76297963481dcb
│  │  │  └─ 69e018a2943c623313bb7504495c71b4638eed
│  │  ├─ 7f
│  │  │  └─ dc5c334729b563cdaa47f9891221c8f99a8b56
│  │  ├─ 80
│  │  │  └─ 936a03775ac9b1d302a1ce7ac591808577145b
│  │  ├─ 83
│  │  │  └─ 422c3d0fc6d047b9d904178c2e462a12754555
│  │  ├─ 84
│  │  │  ├─ aaa25ae5012ed3c36acd9a0a41cec2be71edcf
│  │  │  └─ f46813c1e58ae400b3cb38b5ba35034dfdd8ca
│  │  ├─ 87
│  │  │  └─ 736138bcfe4f9279fb79c56ad03ff01ce97680
│  │  ├─ 88
│  │  │  └─ 596fbe493e68901b6b85adaf47f642464f92ca
│  │  ├─ 8c
│  │  │  └─ 094e14f4270572d6e6444af17c72ecff4e625f
│  │  ├─ 90
│  │  │  ├─ 2e1d071d65daed24a234674b5755547156b091
│  │  │  └─ b0360da0157b54ef5bfb8235b9d0de8e9b2b04
│  │  ├─ 93
│  │  │  └─ bf0b6a6acf637069f212730dd29af6fce63d4a
│  │  ├─ 94
│  │  │  └─ 0f2026202198fb97cb9be02ba223e6b8ca4cb0
│  │  ├─ 95
│  │  │  └─ d2ef9f2402411fe9de684607dc85ec9c4cb532
│  │  ├─ 97
│  │  │  └─ f2a9b9e3074db652a6928882e01fd78876666a
│  │  ├─ 9a
│  │  │  └─ eef622ff7c75806ece0c1f6d715bb9fcfcffa6
│  │  ├─ 9b
│  │  │  └─ 1bc4d1a4617ecab3905c9be4f4c9862c343bf7
│  │  ├─ 9c
│  │  │  └─ 6ab1eaa6fc5f9816617de8c33b4703afcce2d1
│  │  ├─ 9f
│  │  │  ├─ 00502f031f9d5799d60365f8b7f55f6639f3d6
│  │  │  ├─ d7e7eb7056f807531e591fb0e88f5efea8e6ba
│  │  │  └─ e2a675f90cb0225f6828b61b761665f3556a59
│  │  ├─ a0
│  │  │  └─ 70bb7c37a53648565fc1662d5bc20d2f9b1b2b
│  │  ├─ a2
│  │  │  ├─ 0b053ea9dc8edb6bb114fa7627abe84f1bcc1f
│  │  │  ├─ 2391ff0ab906e1d8b471b7263d84315deae479
│  │  │  └─ f0e655a36302a8a9e1b8481fce5133765f690f
│  │  ├─ a3
│  │  │  ├─ 463a560929bc2d1ec72fad3ca7b8f667c50f18
│  │  │  ├─ 4641739a53419102db6e4e6cbca20f10a569b2
│  │  │  └─ 5a4ec5db62d2a1ee60f16e215dcc8e5539d14f
│  │  ├─ a5
│  │  │  ├─ 812deea0fb3690cd9c4cc56fafbde95a2f92f4
│  │  │  └─ c984d3bff01754c82241dfa54e191d1f6cb631
│  │  ├─ a6
│  │  │  └─ f18bfe1ae6cc294411a74c3e371f6a9d2c8e6a
│  │  ├─ a8
│  │  │  └─ 1436628ee704d656ba217b034c1adbf3dc4835
│  │  ├─ aa
│  │  │  └─ 3c180a33a7ca20c9ddfe747b7b9c04f09befb2
│  │  ├─ ab
│  │  │  └─ f09dba49f9f413378f232d4a156c621576d263
│  │  ├─ af
│  │  │  ├─ cc64d2ee22a18bbe84642ddd03828da75f8a70
│  │  │  └─ e1907257a5e397b7e6b324374df19158a1de5d
│  │  ├─ b1
│  │  │  └─ 59d8d5f379234edb46870eb53811afaccfffd1
│  │  ├─ b2
│  │  │  ├─ 1d345e4cbad27558881f3a5cf0c6299c161d94
│  │  │  ├─ 69f783ff96b19ffdab45acd2d4a816634fb3ce
│  │  │  └─ fd36a9a02accea7d340408680395eeddfd9810
│  │  ├─ b3
│  │  │  └─ 7d34e6e0206ac10f06f3785c8d12192e29ee87
│  │  ├─ b8
│  │  │  └─ 502151995d00a9f131bada1e6a1b926f209cd2
│  │  ├─ ba
│  │  │  └─ 96c0156b5f2237e7979564fa03f42e14538911
│  │  ├─ bb
│  │  │  └─ 7cef8d38f5580ba058e60599832e73966c1485
│  │  ├─ bc
│  │  │  └─ b8b6a6c6f43f0a35a75a4bf546086e20866afe
│  │  ├─ bd
│  │  │  └─ 206ca94141e8a837630f8e3cf4e7ea93c3eba2
│  │  ├─ c3
│  │  │  └─ e65b40ed51b7ee1d8728bf563ec1fefb92dc1e
│  │  ├─ c5
│  │  │  └─ 68255d71387044d106bc4369d232cce93e3160
│  │  ├─ c9
│  │  │  └─ 3274e8a95741ee0d1153646608e3d2362aa011
│  │  ├─ ca
│  │  │  ├─ debf449d8ddce0929f06003466a4fc2aca7029
│  │  │  └─ f6e2d92d1f39b11a58a4a76a14c15cabe2ee33
│  │  ├─ cb
│  │  │  ├─ 3f429c6d6ac9054ea71ef77290676350973142
│  │  │  ├─ 94fc2f8a7caa99ffb3ccb54ed7fa2b434a3ae0
│  │  │  └─ e1048f14eec18517bc2db7acb4b1bd10d24e9f
│  │  ├─ cc
│  │  │  ├─ b8b5236aa4df7e2d6fe3793198c546c0a44022
│  │  │  └─ d43fc3a03ad93af3b45fd468e127440d6f7b3c
│  │  ├─ d0
│  │  │  └─ 1f779ffe857c350a556704ae244cec10844ce0
│  │  ├─ d2
│  │  │  └─ c0539f294b2a972f21634da6c4d51808eac6ce
│  │  ├─ d4
│  │  │  └─ f00c3c99c984eddd822342e33a7267147f5d34
│  │  ├─ d6
│  │  │  ├─ 393c19a87bc20c236a8a3cf9c8ff60a96a9d8e
│  │  │  └─ 69564f751d777747a48d4a97f18d9f057515a2
│  │  ├─ d7
│  │  │  └─ 293c5098789a8105c23f8556e84692548eddc9
│  │  ├─ d8
│  │  │  └─ 151f78e258d5f6eade9d812529c3502a8c1b45
│  │  ├─ dd
│  │  │  └─ 922e5362ade404450d9575321b8913c044f050
│  │  ├─ de
│  │  │  └─ 1d8731bb2fa7e05257bf8b49e468222ec10cb1
│  │  ├─ df
│  │  │  └─ 6cd7ff4e7e783284ea84e5faaea9b84811fc1f
│  │  ├─ e5
│  │  │  └─ 33b93733871ee183dab5f6043748e2f57981e8
│  │  ├─ e6
│  │  │  └─ 9de29bb2d1d6434b8b29ae775ad8c2e48c5391
│  │  ├─ e7
│  │  │  ├─ 0f50e3b259055413dfb5a6b86a71c5b88d5b9f
│  │  │  └─ 8e5cafd90a2f7677b494d873cc2c6d5b56be51
│  │  ├─ e9
│  │  │  └─ 9c029161a48776293d49081cc027cc3805f309
│  │  ├─ ea
│  │  │  ├─ 43509c56eca204abd5a7cc3840b05aa03931cc
│  │  │  └─ b4e047e970829b04387d41a17ccaab3dc31544
│  │  ├─ eb
│  │  │  └─ 17ce1b113c7f2c2f3e39915348026e8857f6b1
│  │  ├─ ec
│  │  │  └─ 57182cfd25354c5b919a554eb8acc7ddbf8477
│  │  ├─ f2
│  │  │  └─ ad4a30883a76e92baaf54ece70c61997a564be
│  │  ├─ f4
│  │  │  └─ e4f35a061c77f20fc6f5af70a45ac32df4554e
│  │  ├─ f6
│  │  │  ├─ 09c7fd1ed21d538fd38896b529b24b11f7e6af
│  │  │  └─ 4474df04f06302b704cdca4ca705929fb9157e
│  │  ├─ fa
│  │  │  └─ 5675ec2551f12d53296e49dbf91f15065994bb
│  │  ├─ fb
│  │  │  └─ 148fba1f2805fc987032fe2c92ddde5dda9e84
│  │  ├─ fc
│  │  │  └─ 2791dd5efb38e04058fe3e379f973c1cfafa60
│  │  ├─ fd
│  │  │  └─ f3c4080cdb8ac77766c9cc5430a9b60e103b06
│  │  ├─ fe
│  │  │  └─ 55806ad4bfd472f628a2f95577ba268303c03a
│  │  ├─ info
│  │  └─ pack
│  │     ├─ pack-e4a5aa0c1c749373d1fc49db8348e1b1a8972649.idx
│  │     ├─ pack-e4a5aa0c1c749373d1fc49db8348e1b1a8972649.pack
│  │     └─ pack-e4a5aa0c1c749373d1fc49db8348e1b1a8972649.rev
│  ├─ packed-refs
│  └─ refs
│     ├─ heads
│     │  └─ main
│     ├─ remotes
│     │  └─ origin
│     │     ├─ HEAD
│     │     └─ main
│     └─ tags
├─ .gitignore
├─ admin-panel
│  ├─ .env
│  ├─ composer.json
│  ├─ index.php
│  ├─ scripts
│  │  ├─ compile_scss.php
│  │  └─ set_session.php
│  └─ src
│     ├─ assets
│     │  ├─ css
│     │  │  ├─ styles.css
│     │  │  └─ styles.scss
│     │  ├─ images
│     │  └─ js
│     │     ├─ login.js
│     │     └─ signup.js
│     ├─ components
│     │  ├─ Footer.php
│     │  ├─ Header.php
│     │  └─ Navigation.php
│     ├─ helpers
│     │  └─ CurlHelper.php
│     ├─ middleware
│     │  └─ AuthMiddleware.php
│     ├─ pages
│     │  ├─ DashboardContent.php
│     │  ├─ LoginForm.php
│     │  └─ SignupForm.php
│     └─ views
│        └─ Content.php
├─ api
│  ├─ .env
│  ├─ composer.json
│  ├─ config
│  │  └─ Database.php
│  ├─ controllers
│  │  ├─ CommentController.php
│  │  ├─ PostController.php
│  │  └─ UserController.php
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
├─ php.ini
├─ README.md
└─ sql
   └─ init.sql

```