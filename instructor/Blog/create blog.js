           // Replace the <textarea id="editor1"> with a CKEditor 4
            // instance, using default configuration.
             //var editor= CKEDITOR.replace( 'content1' );
             //CKFinder.setupCKEditor( editor );
            //CKEDITOR.disableAutoInline = true;
            //CKEDITOR.inline( 'content1' );

            var quill = new Quill('#content1', {
                modules: {
                    toolbar: [
                    [{ header: [1, 2, 3, 4, false] }],
                    [{'font':[]}],
                    [{'align':[]}],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['image', 'code-block', 'blockquote'],
                    [{'list': 'ordered'}, {'list': 'bullet'}],
                    [{'script': 'sub'}, {'script': 'super'}],
                    [{'indent': '-1'}, {'indent': '+1'}],
                    [{'direction': 'rtl'}],
                    ['link', 'image', 'video', 'formula'],
                    [{'color': []}, {'background': []}]
                    ]
                },
                placeholder: 'Create your post...',
                theme: 'snow'  // or 'bubble'
            });
            

            // Send the data to the server using AJAX
            $('#submit').on('click',function(){
            var content = quill.root.innerHTML;
                $.ajax({
                    url: 'create_blog.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { content1: content},
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error: ' + error);
                    }
            });
            });
 