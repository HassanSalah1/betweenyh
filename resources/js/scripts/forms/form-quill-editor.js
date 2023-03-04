/*=========================================================================================
	File Name: form-quill-editor.js
	Description: Quill is a modern rich text editor built for compatibility and extensibility.
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
;(function (window, document, $) {
  'use strict'

  var Font = Quill.import('formats/font')
  Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu']
  Quill.register(Font, true)

  // Bubble Editor

  /* var bubbleEditor = new Quill('#bubble-container .editor', {
    bounds: '#bubble-container .editor',
    modules: {
      formula: true,
      syntax: true
    },
    theme: 'bubble'
  }); */

  // Snow Editor

  /* var snowEditor = new Quill('#snow-container .editor', {
    bounds: '#snow-container .editor',
    modules: {
      formula: true,
      syntax: true,
      toolbar: '#snow-container .quill-toolbar'
    },
    theme: 'snow'
  }); */

  // Full Editor

  /*   var fullEditor = new Quill('#full-container .editor', {
    bounds: '#full-container .editor',
    modules: {
      formula: true,
      syntax: true,
      toolbar: [
        [
          {
            font: [],
          },
          {
            size: [],
          },
        ],
        ['bold', 'italic', 'underline', 'strike'],
        [
          {
            color: [],
          },
          {
            background: [],
          },
        ],
        [
          {
            script: 'super',
          },
          {
            script: 'sub',
          },
        ],
        [
          {
            header: [2, 3, 4, 5, 6, false],
          },
          'blockquote',
          // 'code-block',
        ],
        [
          {
            list: 'ordered',
          },
          {
            list: 'bullet',
          },
          {
            indent: '-1',
          },
          {
            indent: '+1',
          },
        ],
        [
          {
            direction: 'rtl',
          },
          {
            align: [],
          },
        ],
        ['link', 'image', 'video', 'formula'],
        ['clean'],
      ],
    },
    theme: 'snow',
  }) */

  var itemDescAr = new Quill('#full-desc-ar .editor', {
    bounds: '#full-desc-ar .editor',
    modules: {
      formula: true,
      syntax: true,
      toolbar: [
        [
          {
            font: [],
          },
          {
            size: [],
          },
        ],
        ['bold', 'italic', 'underline', 'strike'],
        [
          {
            color: [],
          },
          {
            background: [],
          },
        ],
        [
          {
            script: 'super',
          },
          {
            script: 'sub',
          },
        ],
        [
          {
            header: [2, 3, 4, 5, 6, false],
          },
          'blockquote',
          // 'code-block',
        ],
        [
          {
            list: 'ordered',
          },
          {
            list: 'bullet',
          },
          {
            indent: '-1',
          },
          {
            indent: '+1',
          },
        ],
        [
          {
            direction: 'rtl',
          },
          {
            align: [],
          },
        ],
        ['link', 'image', 'video', 'formula'],
        ['clean'],
      ],
    },
    theme: 'snow',
  })

  itemDescAr.on('text-change', function (delta, oldDelta, source) {
    if (source == 'api') {
      console.log('An API call triggered this change.')
    } else if (source == 'user') {
      $('#hiddenDescAr').val(itemDescAr.root.innerHTML)
    }
  })
  itemDescAr.format('direction', 'rtl')
  itemDescAr.format('align', 'right')

  var itemDescEn = new Quill('#full-desc-en .editor', {
    bounds: '#full-desc-en .editor',
    modules: {
      formula: true,
      syntax: true,
      toolbar: [
        [
          {
            font: [],
          },
          {
            size: [],
          },
        ],
        ['bold', 'italic', 'underline', 'strike'],
        [
          {
            color: [],
          },
          {
            background: [],
          },
        ],
        [
          {
            script: 'super',
          },
          {
            script: 'sub',
          },
        ],
        [
          {
            header: [2, 3, 4, 5, 6, false],
          },
          'blockquote',
          // 'code-block',
        ],
        [
          {
            list: 'ordered',
          },
          {
            list: 'bullet',
          },
          {
            indent: '-1',
          },
          {
            indent: '+1',
          },
        ],
        [
          {
            direction: 'rtl',
          },
          {
            align: [],
          },
        ],
        ['link', 'image', 'video', 'formula'],
        ['clean'],
      ],
    },
    theme: 'snow',
  })
  itemDescEn.on('text-change', function (delta, oldDelta, source) {
    if (source == 'api') {
      console.log('An API call triggered this change.')
    } else if (source == 'user') {
      $('#hiddenDescEn').val(itemDescEn.root.innerHTML)
    }
  })
  itemDescEn.format('direction', 'ltr')
  itemDescEn.format('align', 'left')

  // var editors = [bubbleEditor, snowEditor, fullEditor]
})(window, document, jQuery)
