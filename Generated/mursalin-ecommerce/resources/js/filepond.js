import * as FilePond from "filepond";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";

// Import FilePond styles
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

// Register the plugin
FilePond.registerPlugin(FilePondPluginImagePreview);

// Select the file input element
if(document.querySelector("#profile_image")) {
const inputElement = document.querySelector("#profile_image");

// Create the FilePond instance
const pond = FilePond.create(inputElement, {
    storeAsFile: true,
    allowImagePreview: true,
    imagePreviewHeight: 170,
    imagePreviewMaxHeight: 250,
    labelIdle: 'Drag & Drop your image or <span class="filepond--label-action"> Browse </span>',
});

}
if(document.querySelector("#shop_logo")) {
const inputElement = document.querySelector("#shop_logo");

// Create the FilePond instance
const pond = FilePond.create(inputElement, {
    storeAsFile: true,
    allowImagePreview: true,
    imagePreviewHeight: 170,
    imagePreviewMaxHeight: 250,
    labelIdle: 'Drag & Drop your logo or <span class="filepond--label-action"> Browse </span>',
});

}

if(document.querySelector("#product_image")) {
const inputElement = document.querySelector("#product_image");

// Create the FilePond instance
const pond = FilePond.create(inputElement, {
    storeAsFile: true,
    allowImagePreview: true,
    imagePreviewHeight: 80,
    imagePreviewMaxHeight: 80,
    allowMultiple: true,
    itemInsertAspectRatio: '1:1', 
    labelIdle: 'Drag & Drop your image or <span class="filepond--label-action"> Browse </span>',
});

}
