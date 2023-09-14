<!doctype html>


<html lang="en">

<head>


 
    <link href="modulo-pagina/proview/jPopup.css" rel="stylesheet" type="text/css">
</head>

    <body>
     

        <main class="demoContent">
       <h2>Simple lightweight javascript popup modal plugin</h2>
        <button class="openPopupButton" type="button">Open popup</button></main>


            <main class="{{$contenido->title}}">
                <h2>{!!$contenido->title!!}</h2>
                <button class="{{$contenido->title}}" type="button">Open popup</button>
           </main>



        <script src="modulo-pagina/proview/jPopup.min.js"></script>

        <script>/*** DEMO js ***/

    document.querySelector('.openPopupButton').addEventListener('click', function() {

        var demoContent = '<div>\
            <strong>Hurray</strong>\
            <p>You can put any content you want here.</p>\
            <p>Closeable by pressing <em>ESC</em> key.</p>\
            <p>Also closeable by navigating backwards in browser (<a href="https://developer.mozilla.org/en-US/docs/Web/API/History_API">History API</a>).</p>\
            <p>Style it as you wish :)</p>\
            <p>See more options at <a href="https://github.com/robiveli/jpopup">GitHub</a></p>\
        </div>';

        var jPopupDemo = new jPopup({

            content: demoContent,
            hashtagValue: '#demopopup'

        });

    });</script>

    <script>/*** DEMO js ***/

    document.querySelector('.{{$contenido->title}}').addEventListener('click', function() {

        var {{$contenido->title}} = '<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-lg-offset-2" Style="background:red">\
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">\
        <img src="{{$contenido->image}}" class="img-responsive" alt="Image"></div>\
		</div>\
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">\
		{{$contenido->contents}}\
		</div>';
        var jPopupDemo = new jPopup({

            content: {{$contenido->title}},
            hashtagValue: '#demopopup'

        });

    });</script>

</body>
</html>