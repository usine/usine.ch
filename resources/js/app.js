import flatpickr from "flatpickr";
import { French } from "flatpickr/dist/l10n/fr.js";

import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

require('./bootstrap');

let flatpickrOptions = {
  'locale': French,
}

var datepickers = document.querySelectorAll('[data-datepicker]');
Array.prototype.forEach.call(datepickers, function(el, i){
  switch (el.dataset.datepicker) {
    case 'date':
      flatpickr(el, {
        ...flatpickrOptions,
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "Y-m-d",
      });
      break;
    case 'datetime':
      flatpickr(el, {
        ...flatpickrOptions,
        enableTime: true,
        dateFormat: "Y-m-dTH:i",
        altInput: true,
        altFormat: "j F Y H:i",
      });
      break;
  }
});

let editor = document.querySelector('#editor')
if (editor) {
  ClassicEditor.create(editor, {
    removePlugins: ['ImageUpload', 'Table', 'TableToolbar'],
    toolbar: ['Heading', '|', 'Bold', 'Italic', 'Link', 'bulletedList', 'numberedList', '|', 'Indent', 'Outdent', '|', 'BlockQuote', 'MediaEmbed', 'Undo', 'Redo']
  })
}
