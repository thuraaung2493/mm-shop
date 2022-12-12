# MM-Shop

This is task assignments project.

## Setup

```
  # ssh
  git clone git@github.com:thuraaung2493/mm-shop.git
  # https
  git clone https://github.com/thuraaung2493/mm-shop.git

  cd mm-shop

  composer install
  npm insall
  npm run build
```
## Migration, Seed & Run

```
  php artisan migrate --seed
  php artisan serve
```

Login with email: `mmshop.admin@gmail.com`  and password: `admin12478`.


## Features
### API

- login authentication using any library and login information must be included username and password
- category list and detail
- sub_category list and detail
- item lists and detail
- order create (Note: When order create, multiple items must be included)

### Backend Admin

- User
  - CRUD and activate, deactivate
- Role
  - CRUD
- Category
  - CRUD
- Sub Category
  - CRUD
- Item
  - CRUD

#### Author: [thuraaung2493](https://github.com/thuraaung2493)

#### License: ISC
