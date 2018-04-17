# DrMVC Application - Demo

Small demo application based on [DrMVC Application Skeleton](https://github.com/drmvc/app).

## How to install

For first we need clone the demo project

    git clone https://github.com/drmvc/demo.git application
    cd application

For enabling support of `gulpfile.js` need to install `gulp` tool

    npm install -g gulp

Now need to install dependencies and build static files

    composer update
    npm install
    gulp

Let's run the php localhost server

    cd public
    php -S localhost:8000

Now you can open your web-browser and go to http://localhost:8000

## Links

* [DrMVC project website](https://drmvc.com/)
* [DrMVC Application](https://github.com/drmvc/demo)
