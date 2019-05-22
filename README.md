# Vue eCards
Simple VueJS app to create and send eCards to up to 100 recipients at a time. Self-hosted and whitelabel ready, download, configure, and launch. Great for internal employee recognitions, or for employees and account managers to send holiday emails (eCards) to customers!

## Demo
View the [live demo here](https://russellramey.me/examples/vue-ecards). eCards made using this demo application will not be sent.

## Requirements
- [NodeJS + NPM](https://nodejs.org/en/)

## Technologies
- VueJS
- Pug
- Sass

## Commands
* ### Instalation
  ```
  npm install
  ```
* ### Build and watch for development
  ```
  npm run serve
  ```
* ### Build for production
  ```
  npm run build
  ```

## Customize
Once you have the app up and running, you can configure it for your use case.

### Logo
Whitelabel the application by adding your logo. Replace the `logo_placeholder.jpg` file in `public/images/` with the desired logo you want to use.

### eCard Images
Add your own artwork or images to be used for the eCard designs. They should be at least 768px wide. Height doesn't matter, they can all be the same height or have varying heights. Add your desired artwork/images into the `public/images/ecards` directory.

### eCard Options
Add your eCard Images and customize the color options in `src/stores/dataOptions.js`. The `designs` object holds the available eCard Design options and need `category` and `image` keys. The `colors` object holds the available Accent Color options and need a `background`, `shadow`, and `name` keys.

### Submit Action
Lastly, you can create your own submission script or use the provided php script in `public/submit/index.php`. You can customize this script with the configuration variables at the top of the file.

Config variables:
- `$baseURL`: This is the document root for where the application will live, it will be used as a reference for the application to know where all assets are stored for the HTML email created.
- `$allowedDomains`: Add domains to this array that will be allowed to POST requests to the application. This will help prevent unintended requests submitting spam.
