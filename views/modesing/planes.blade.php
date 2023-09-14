<style type="text/css">

.pricingTable{
    text-align: center;
    background: #fff;
    margin: 0 -15px;
    box-shadow: 0 0 10px #ababab;
    padding-bottom: 40px;
    border-radius: 10px;
    color: #cad0de;
    transform: scale(1);
    transition: all 0.5s ease 0s;
}
.pricingTable:hover{
    transform: scale(1.05);
    z-index: 1;
}
.pricingTable .pricingTable-header{
    padding: 40px 0;
    background: #f5f6f9;
    border-radius: 10px 10px 50% 50%;
    transition: all 0.5s ease 0s;
}
.pricingTable:hover .pricingTable-header{
    background: #bb1639;
}
.pricingTable .pricingTable-header i{
    font-size: 50px;
    color: #858c9a;
    margin-bottom: 10px;
    transition: all 0.5s ease 0s;
}
.pricingTable .price-value{
    font-size: 35px;
    transition: all 0.5s ease 0s;
}
.pricingTable .month{
    display: block;
    font-size: 14px;
    color: #cad0de;
}
.pricingTable:hover .pricingTable-header i,
.pricingTable:hover .price-value,
.pricingTable:hover .month{
    color: #fff;
}
.pricingTable .heading{
    font-size: 24px;
    margin-bottom: 20px;
    text-transform: uppercase;
}
.pricingTable .pricing-content ul{
    list-style: none;
    padding: 0;
    margin-bottom: 30px;
}
.pricingTable .pricing-content ul li{
    line-height: 30px;
    color: #a7a8aa;
}
.pricingTable .pricingTable-signup a{
    display: inline-block;
    font-size: 15px;
    color: #fff;
    padding: 10px 35px;
    border-radius: 20px;
    background: #ffa442;
    text-transform: uppercase;
    transition: all 0.3s ease 0s;
}
.pricingTable .pricingTable-signup a:hover{
    box-shadow: 0 0 10px #ffa442;
}
.pricingTable.blue .price-value,
.pricingTable.blue .heading{
    color: #4b64ff;
}
.pricingTable.blue:hover .pricingTable-header,
.pricingTable.blue .pricingTable-signup a{
    background: #4b64ff;
}
.pricingTable.blue .pricingTable-signup a:hover{
    box-shadow: 0 0 10px #4b64ff;
}
.pricingTable.red .price-value,
.pricingTable.red .heading{
    color: #ff4b4b;
}
.pricingTable.red:hover .pricingTable-header,
.pricingTable.red .pricingTable-signup a{
    background: #ff4b4b;
}
.pricingTable.red .pricingTable-signup a:hover{
    box-shadow: 0 0 10px #ff4b4b;
}
.pricingTable.green .price-value,
.pricingTable.green .heading{
    color: #40c952;
}
.pricingTable.green:hover .pricingTable-header,
.pricingTable.green .pricingTable-signup a{
    background: #40c952;
}
.pricingTable.green .pricingTable-signup a:hover{
    box-shadow: 0 0 10px #40c952;
}
.pricingTable.blue:hover .price-value,
.pricingTable.red:hover .price-value,
.pricingTable.green:hover .price-value{
    color: #fff;
}
@media screen and (max-width: 990px){
    .pricingTable{ margin: 0 0 20px 0; }
}
</style>

<style type="text/css">

.toggle-tabs li {float:left;margin:5px;list-style:none;}
.toggle-tabs li.active-tab {}
.tabbed-content-wrap {
  float:left;
  width:100%;
}

.test {
  display: flex;
  align-items: center;
  justify-content: center;
}

ul {
  list-style: none;
}

.test ul li {
  display: inline-block;
}

.content-box {display:none;}
.content-box.active-content-box {display:block;}
</style>
<div class="toggle-wrap">
  <div class="test">
  <ul class="toggle-tabs center-block">
    <li class="active-tab btn btn-primary btn-lg">Mensual</li>
    <li class="btn btn-primary btn-lg">Semestral</li>
    <li class="btn btn-primary btn-lg">Anual</li>
  </ul>
  </div>
  <div class="tabbed-content-wrap">
  
             
     <div class="content-box active-content-box">
       @foreach($planessaas as $planessaasm)
      @if($planessaasm->int_conteo == 1)
       <div class="col-md-4 col-sm-4">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <i class="fa fa-adjust"></i>
                        <div class="price-value text-primary"> $ {{number_format($planessaasm->amount,0,",",".")}} <span class="month">per month</span> </div>
                    </div>
                    <h3 class="heading text-primary">{{$planessaasm->name}}</h3>
                    <div class="pricing-content">
                        <ul>
                            {!!$planessaasm->datos!!}
                        </ul>
                    </div>
                    

                    <div class="">
                        
                       <form action="/suscripcion/session" method="post">
                                <input type="hidden" name="id_plan" id="input" class="form-control" value="{{$planessaasm->id_plan}}" required="required">
                

                            <button type="submit" class="btn btn-primary btn-md">Adquirir plan</button>
                          </form>
                    </div>
                </div>
            </div>
       @else
     @endif
     @endforeach
     </div>
     
     
     <div class="content-box">
      @foreach($planessaas as $planessaasm)
       @if($planessaasm->int_conteo == 6)
       <div class="col-md-4 col-sm-4">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <i class="fa fa-adjust"></i>
                        <div class="price-value text-primary"> $ {{number_format($planessaasm->amount,0,",",".")}} <span class="month">per month</span> </div>
                    </div>
                    <h3 class="heading text-primary">{{$planessaasm->name}}</h3>
                    <div class="pricing-content">
                        <ul>
                            {!!$planessaasm->datos!!}
                        </ul>
                    </div>
                    

                    <div class="">
                        
                       <form action="/suscripcion/session" method="post">
                                <input type="hidden" name="id_plan" id="input" class="form-control" value="{{$planessaasm->id_plan}}" required="required">
                

                            <button type="submit" class="btn btn-primary btn-md">Adquirir plan</button>
                          </form>
                    </div>
                </div>
            </div>
       @else
     @endif
      @endforeach
     </div>
    
    <div class="content-box">
      @foreach($planessaas as $planessaasm)
       @if($planessaasm->int_conteo == 12)
       <div class="col-md-4 col-sm-4">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <i class="fa fa-adjust"></i>
                        <div class="price-value text-primary"> $ {{number_format($planessaasm->amount,0,",",".")}} <span class="month">per month</span> </div>
                    </div>
                    <h3 class="heading text-primary">{{$planessaasm->name}}</h3>
                    <div class="pricing-content">
                        <ul>
                            {!!$planessaasm->datos!!}
                        </ul>
                    </div>
                    

                    <div class="">
                        
                       <form action="/suscripcion/session" method="post">
                                <input type="hidden" name="id_plan" id="input" class="form-control" value="{{$planessaasm->id_plan}}" required="required">
                

                            <button type="submit" class="btn btn-primary btn-md">Adquirir plan</button>
                          </form>
                    </div>
                </div>
            </div>
       @else
     @endif
      @endforeach
     </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
  $(".toggle-tabs li").click(function(){
 $(this).addClass('active-tab').parents('ul.toggle-tabs').find('li').not($(this)).removeClass('active-tab');
 var currentTabIndex = $(this).index();
 $('.content-box:eq('+ currentTabIndex +')').addClass('active-content-box').parents('.tabbed-content-wrap').find('.content-box').not($('.content-box:eq('+ currentTabIndex +')')).removeClass('active-content-box');
});
</script>

<style type="text/css">
  button {
  background-color: blue;
  border-radius: 5px;
  color: white;
  padding: 10px;
}

 .test .active {
  background-color: #793644 !important;  
}
</style>



<script type="text/javascript">
  $(function() {
  var botones = $(".test li");
  botones.click(function() {
    botones.removeClass('active');
    $(this).addClass('active');
  });
});
</script>



