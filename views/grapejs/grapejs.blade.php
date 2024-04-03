<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gestor SiteCMS</title>

    <link rel="stylesheet" href="//unpkg.com/grapesjs/dist/css/grapes.min.css">
    <script src="//unpkg.com/grapesjs"></script>
    <script src="//unpkg.com/grapesjs-user-blocks"></script>
    <link href="https://unpkg.com/grapesjs-user-blocks/dist/grapesjs-user-blocks.min.css" rel="stylesheet">

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
       <style type="text/css">
       @foreach($pages as $pagesa)
        {!!$pagesa->page_css!!}
       @endforeach
       </style>
    
       @foreach($pages as $pages)
        {!!$pages->page_data!!}
       @endforeach
      </div>

     </body>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
    <script>
    const editor = grapesjs.init({
    clearOnRender: true,
    container: '#gjs',
    fromElement: true,
    height: '100%',
    plugins: ['grapesjs-user-blocks'],
    allowScripts: 1,  
    showOffsets: true,
    embedAsBase64: false,  

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



    assetManager: {
     storageType     : '',
     storeOnChange  : true,
     storeAfterUpload  : true,
     upload: true,
      embedAsBase64: false,
          custom: false,



     assets       : [
     @foreach($assets as $assetss)
     '{!!$assetss->image!!}',
     @endforeach  
     // Pass an object with your properties
     ],

     uploadFile: function(e) {
     var files = e.dataTransfer ? e.dataTransfer.files : e.target.files;
     var formData = new FormData();
     for(var i in files){
     formData.append('file-'+i, files[i]) //containing all the selected images from local
     }

     $.ajax({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      
      url: '/grape/upload',
      type: 'POST',
      data: formData,
      contentType:false,
      crossDomain: false,
      dataType: 'json',
      mimeType: "multipart/form-data",
      processData:false,

      success: function(result){
        $("divid").load(" #divid");
       var myJSON = [];
       var data = 'dsfsfdsfds';
       $.each( result['data'], function( key, value ) {

       myJSON[key] = value;  
      //location.reload();
       });

       var images = myJSON;    
       editor.AssetManager.add(images);
       }
       });
       },
       },


       blockManager: {
        blocks : {!!$contenidos!!} 
       },

       storageManager: {
        type: 'remote', // Type of the storage, available: 'local' | 'remote'
        autosave: false, // Store data automatically
        autoload: true, // Autoload stored data on init
       },
     });

    </script> 

    <script type="text/javascript">
      function updateDiv()
{ 
    $( ".gjs-am-assets" ).load(window.location.href + ".gjs-am-assets" );
}
    </script>
 <!--
    <script type="text/javascript">
     editor.addComponents('<script src="/templates/base/js/bootstrap.min.js"><\/script><script src="/templates/base/js/jquery-3.5.1.slim.min.js"><\/script><script src="/templates/base/js/popper.min.js"><\/script>')
    </script>
-->
    <script type="text/javascript">
     editor.Panels.addButton('options',[{
     id: 'save-db',
     className: 'fas fa-save',
     command: 'save-db',
     attributes: {
     title: 'Save Changes'
     },
     }]);
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
   var jsdata = editor.getJs();
    var page = searchParams.get('page');
    $.ajax({
            url: '/productos/all',
            method: 'POST',       
            data: {
             pagesold: searchParams.get('page'),
             html:htmldata,
             css: cssdata,
             js: jsdata,
             _token: $('meta[name="csrf-token"]').attr('content'),

            }
           
           }).done(function(res){

      alert(res);

        });
 }
});
</script>



  <script type="text/javascript">

          
  </script>






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

<script type="text/javascript">
  editor.Components.addType('input', {
    isComponent: el => el.tagName === 'INPUT',
    model: {
      defaults: {
        traits: [
          // Strings are automatically converted to text types
          'name', // Same as: { type: 'text', name: 'name' }
          'placeholder',
          {
            type: 'select', // Type of the trait
            name: 'type', // (required) The name of the attribute/property to use on component
            label: 'Type', // The label you will see in Settings
            options: [
              { id: 'text', label: 'Text'},
              { id: 'email', label: 'Email'},
              { id: 'password', label: 'Password'},
              { id: 'number', label: 'Number'},
              { id: 'hidden', label: 'Hidden'},
            ]
          }, {
            type: 'checkbox',
            name: 'required',
        }],
        // As by default, traits are bound to attributes, so to define
        // their initial value we can use attributes
        attributes: { type: 'text', required: true },
      },
    },
});
</script>

    
    </body>
</html>