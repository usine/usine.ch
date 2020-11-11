import bsCustomFileInput from 'bs-custom-file-input';
import flatpickr from "flatpickr";
import { French } from "flatpickr/dist/l10n/fr.js";

import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

require('./bootstrap');

$(document).ready(function () {
  bsCustomFileInput.init()

  let flatpickrOptions = {
    'locale': French,
  }
  $('[data-datepicker]').each((i, e) => {
    switch (e.dataset.datepicker) {
      case 'date':
        flatpickr(e, {
          ...flatpickrOptions,
          altInput: true,
          altFormat: "j F Y",
          dateFormat: "Y-m-d",
        });
        break;
      case 'datetime':
        flatpickr(e, {
          ...flatpickrOptions,
          enableTime: true,
          dateFormat: "Y-m-dTH:i",
          altInput: true,
          altFormat: "j F Y H:i",
        });
        break;
    }
  })

  let editor = document.querySelector('#editor')
  if (editor) {
    ClassicEditor.create(editor, {
      removePlugins: ['ImageUpload', 'Table', 'TableToolbar'],
      toolbar: ['Heading', '|', 'Bold', 'Italic', 'Link', 'bulletedList', 'numberedList', '|', 'Indent', 'Outdent', '|', 'BlockQuote', 'MediaEmbed', 'Undo', 'Redo']
    })
  }
})
