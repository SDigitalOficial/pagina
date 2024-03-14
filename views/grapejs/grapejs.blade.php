<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Page Title</title>

		<link rel="stylesheet" href="//unpkg.com/grapesjs/dist/css/grapes.min.css">
		<script src="//unpkg.com/grapesjs"></script>
 <style type="text/css">
   body{
    margin: 0px;
   }
   .gjs-editor-cont{
    position: fixed;
   }
 </style>
    
	</head>
	

	<body>



  <div id="gjs">
    @foreach($pages as $pages)
    {!!$pages->page_data!!}
    @endforeach

  </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script type="text/javascript">
  $(document).ready(function(){
        blocks : {!!$contenidos!!}
      });
</script>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		
		<script>
     
const editor = grapesjs.init({
   
  // Indicate where to init the editor. You can also pass an HTMLElement
  container: '#gjs',
  // Get the content for the canvas directly from the element
  // As an alternative we could use: `components: '<h1>Hello World Component!</h1>'`,
  fromElement: true,
  // Size of the editor
  height: '100%',
  //width: 'auto',
  // Disable the storage manager for the moment
  //storageManager: false,
  // Avoid any default panel


 


  canvas: {
   styles: [
    @foreach($plantillas as $plantillass)
    {!!$plantillass->css!!}
    @endforeach

    ],
   scripts: [
     @foreach($plantillas as $plantillas)
    {!!$plantillas->javascript!!}
    @endforeach
   ],
  },

  panels: {},

   assetManager: {
   
    // Upload endpoint, set `false` to disable upload, default `false`
    upload: '/productos/allupload',
    autoAdd: true,
    // The name used in POST to pass uploaded files, default: `'files'`
    uploadName: 'files',
   
  },


  blockManager: {
   
   blocks : {!!$contenidos!!} 
    
  },


    // Default configurations
  storageManager: {
   
   type: 'remote', // Type of the storage, available: 'local' | 'remote'
      autosave: false, // Store data automatically
      autoload: false, // Autoload stored data on init
    
  },

  assetManager: {
    assets: [],
    
  }



});
</script>	




<script type="text/javascript">
  
  editor.Panels.addButton('options',
 [{
   id: 'save-db',
   className: 'fas fa-save',
   command: 'save-db',
   attributes: {
     title: 'Save Changes'
   },
 }]
);
</script>

<script type="text/javascript">
  editor.runCommand('open-blocks')
</script>


<script type="text/javascript">
const searchParams = new URLSearchParams(window.location.search);
  editor.Commands.add('save-db', {
 run: function(editor, sender) {
   sender && sender.set('active', 0); // turn off the button
   editor.store();
   //storing values to variables
   var htmldata = editor.getHtml();
   var cssdata = editor.getCss();
    var page = searchParams.get('page');
    $.ajax({
            url: '/productos/all',
            method: 'POST',       
            data: {
             pagesold: searchParams.get('page'),
             html:htmldata,
             css: cssdata,
             _token: $('meta[name="csrf-token"]').attr('content'),

            }
           
           }).done(function(res){

      alert(res);

        });
 }
});
</script>

<script type="text/javascript">
  const searchParamss = new URLSearchParams(window.location.search);
$(document).ready(function(){ 
   $.ajax({
            url: '/productos/alltrait',
            method: 'POST',       
            data: {
             pagesold: searchParamss.get('page'),
             html:1,
             _token: $('meta[name="csrf-token"]').attr('content'),
            }
           }).done(function(res){

            var arreglo = JSON.parse(res);
            //console.log(arreglo);

            for(var x=0;x<arreglo.lenght;x++){

              var todo ='<div id="gjs">'+arreglo[x].page_data+'</div>';

            }

        });
         });
</script>

<!--
<script type="text/javascript">
  $.ajax({
url: 'upload_image.php',
type: 'POST',
       data: formData,
       contentType:false,
crossDomain: true,
dataType: 'json',
mimeType: "multipart/form-data",
processData:false,
success: function(result){
               var myJSON = [];
               $.each( result['data'], function( key, value ) {
                       myJSON[key] = value;    
               });
               var images = myJSON;    
         editor.AssetManager.add(images); 
           }
});
</script>
-->


<script type="text/javascript">
var pfx = editor.getConfig().stylePrefix
    var modal = editor.Modal
    var cmdm = editor.Commands
    var htmlCodeViewer = editor.CodeManager.getViewer('CodeMirror').clone()
    var cssCodeViewer = editor.CodeManager.getViewer('CodeMirror').clone()
    var pnm = editor.Panels
    var container = document.createElement('div')
    var btnEdit = document.createElement('button')

    htmlCodeViewer.set({
      codeName: 'htmlmixed',
      readOnly: 0,
      theme: 'hopscotch',
      autoBeautify: true,
      autoCloseTags: true,
      autoCloseBrackets: true,
      lineWrapping: true,
      styleActiveLine: true,
      smartIndent: true,
      indentWithTabs: true
    })

    cssCodeViewer.set({
      codeName: 'css',
      readOnly: 0,
      theme: 'hopscotch',
      autoBeautify: true,
      autoCloseTags: true,
      autoCloseBrackets: true,
      lineWrapping: true,
      styleActiveLine: true,
      smartIndent: true,
      indentWithTabs: true
    })

    btnEdit.innerHTML = 'Save'
    btnEdit.className = pfx + 'btn-prim ' + pfx + 'btn-import'
    btnEdit.onclick = function () {
      var html = htmlCodeViewer.editor.getValue()
      var css = cssCodeViewer.editor.getValue()
      editor.DomComponents.getWrapper().set('content', '')
      editor.setComponents(html.trim())
      editor.setStyle(css)
      modal.close()
    }

    cmdm.add('edit-code', {
      run: function (editor, sender) {
        sender && sender.set('active', 0)
        var htmlViewer = htmlCodeViewer.editor
        var cssViewer = cssCodeViewer.editor
        modal.setTitle('Edit code')
        if (!htmlViewer && !cssViewer) {
          var txtarea = document.createElement('textarea')
          var cssarea = document.createElement('textarea')
          container.appendChild(txtarea)
          container.appendChild(cssarea)
          container.appendChild(btnEdit)
          htmlCodeViewer.init(txtarea)
          cssCodeViewer.init(cssarea)
          htmlViewer = htmlCodeViewer.editor
          cssViewer = cssCodeViewer.editor
        }
        var InnerHtml = editor.getHtml()
        var Css = editor.getCss()
        modal.setContent('')
        modal.setContent(container)
        htmlCodeViewer.setContent(InnerHtml)
        cssCodeViewer.setContent(Css)
        modal.open()
        htmlViewer.refresh()
        cssViewer.refresh()
      }
    })

    pnm.addButton('options',
      [
        {
          id: 'edit',
          className: 'fa fa-edit',
          command: 'edit-code',
          attributes: {
            title: 'Edit Code'
          }
        }
      ]
    )
</script>



		
		</body>
</html>