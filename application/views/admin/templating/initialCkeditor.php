<script>
    CKEDITOR.replace("editor-halaman-1", {



        toolbar: [{
                name: 'clipboard',
                items: ['PasteFromWord', '-', 'Undo', 'Redo']
            },
            {
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'Subscript', 'Superscript']
            },
            {
                name: 'links',
                items: ['Link', 'Unlink']
            },
            {
                name: 'paragraph',
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
            },
            {
                name: 'insert',
                items: ['Image', 'Table']
            },
            {
                name: 'editing',
                items: ['Scayt', 'Maximize']
            },
            '/',

            {
                name: 'styles',
                items: ['Format', 'Font', 'FontSize']
            },
            {
                name: 'colors',
                items: ['TextColor', 'BGColor', 'CopyFormatting']
            },
            {
                name: 'align',
                items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
            },
            {
                name: 'document',
                items: ['Print', 'PageBreak', 'Source']
            }
        ],

        customConfig: '',

        filebrowserImageBrowseUrl: '<?= base_url('assetsDashboard/kcfinder/browse.php') ?>',
        disallowedContent: 'img{width,height,float}',
        extraAllowedContent: 'img[width,height,align]',


        extraPlugins: 'colorbutton,font,justify,print,tableresize,uploadimage,uploadfile,pastefromword,liststyle,pagebreak',

        bodyClass: 'document-editor',


        format_tags: 'p;h1;h2;h3;pre',

        removeDialogTabs: 'image:advanced;link:advanced',
    })
    </script>

<script>
    CKEDITOR.replace("editor-halaman-2", {



        toolbar: [{
                name: 'clipboard',
                items: ['PasteFromWord', '-', 'Undo', 'Redo']
            },
            {
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'Subscript', 'Superscript']
            },
            {
                name: 'links',
                items: ['Link', 'Unlink']
            },
            {
                name: 'paragraph',
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
            },
            {
                name: 'insert',
                items: ['Image', 'Table']
            },
            {
                name: 'editing',
                items: ['Scayt', 'Maximize']
            },
            '/',

            {
                name: 'styles',
                items: ['Format', 'Font', 'FontSize']
            },
            {
                name: 'colors',
                items: ['TextColor', 'BGColor', 'CopyFormatting']
            },
            {
                name: 'align',
                items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
            },
            {
                name: 'document',
                items: ['Print', 'PageBreak', 'Source']
            }
        ],

        customConfig: '',

        filebrowserImageBrowseUrl: '<?= base_url('assetsDashboard/kcfinder/browse.php') ?>',
        disallowedContent: 'img{width,height,float}',
        extraAllowedContent: 'img[width,height,align]',


        extraPlugins: 'colorbutton,font,justify,print,tableresize,uploadimage,uploadfile,pastefromword,liststyle,pagebreak',

        bodyClass: 'document-editor',


        format_tags: 'p;h1;h2;h3;pre',

        removeDialogTabs: 'image:advanced;link:advanced',
    })
    </script>