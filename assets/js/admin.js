$(document).ready(function () {
    $('#table').DataTable();
});
$(document).ready(function () {
    ClassicEditor
        .create(document.querySelector('.editor'), {

            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'strikethrough',
                    'underline',
                    'subscript',
                    'superscript',
                    'fontSize',
                    'fontFamily',
                    '|',
                    'bulletedList',
                    'numberedList',
                    'fontColor',
                    '|',
                    'htmlEmbed',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'undo',
                    'redo',
                    'code'
                ]
            },
            language: 'id',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells',
                    'tableCellProperties',
                    'tableProperties'
                ]
            },
            licenseKey: '',


        })
        .then(editor => {
            window.editor = editor;








        })
        .catch(error => {
            console.error('Oops, something went wrong!');
            console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
            console.warn('Build id: pksek945jlps-p3ilvsy9cnam');
            console.error(error);
        });
});