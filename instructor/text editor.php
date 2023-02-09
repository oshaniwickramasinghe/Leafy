<script>
      function selectLocalImage(){
            
        }

        var quill = new Quill('#text-editor', {
        modules: {
            toolbar: {
                container: [
                [{ header: [1, 2, 3,false] }],
                ['bold', 'italic', 'underline'],
                ['image','link','blockquote', 'code-block'],
                [{ list: "ordered"}, { list: "bullet"}],
             ],
             handlers: {
                image: selectLocalImage,
             },
            }, 
        },
        placeholder: 'Compose an epic...',
         theme: 'snow'  // or 'bubble'
        });
</script>

<div class="text-editor" id="text-editor"></div>