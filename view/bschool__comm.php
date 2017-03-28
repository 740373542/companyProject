<?php
// $__pageBgColor = '#FFF';
include \view('inc_home_header');
?>


    <style type="text/css">
        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
            -webkit-tap-highlight-color: transparent;
            -webkit-touch-callout: none;
        }
        
        
        .toolbar {
            padding: 0px;
            min-height: 3.2rem;
            line-height: 3.2rem;
            color:#0561BC;
            font-weight: 400;
            background: #FFF;
        }
        
        .e-header {
            position: relative;
            z-index: 1;
        }
        
        .e-header::after {
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 5px;
            background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAHBAMAAADzDtBxAAAAD1BMVEUAAAAAAAAAAAAAAAAAAABPDueNAAAABXRSTlMUCS0gBIh/TXEAAAAaSURBVAjXYxCEAgY4UIICBmMogMsgFLtAAQCNSwXZKOdPxgAAAABJRU5ErkJggg==);
            background-repeat: repeat-x;
            background-position: 0 -2px;
            content: "";
        }
        
        
        .e-title {
            margin-left: 12px;
            min-height: 3.2rem;
            line-height: 3.2rem;
            font-size: 16px;
        }
        
        
        e-row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            width: 100%;
            flex: 1;
        }
        
        e-col {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 100%;
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
            padding: 0;
        }
        
        .e-card {
            overflow: hidden;
            display: flex;
            margin: 10px 10px 10px 10px;
            width: calc(100% - 20px);
            border-radius: 2px;
            font-size: 1.4rem;
            background: #fff;
            box-shadow: 0 1px 5px 0 rgba(0,0,0,0.19)
        }
        e-card {
            overflow: hidden;
            display: flex;
            margin: 10px 10px 10px 10px;
            width: calc(100% - 20px);
            border-radius: 2px;
            font-size: 1.4rem;
            background: #fff;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        }
        
        e-col-2 {
            width:50%;
            display: block;
/*            background: #FF0000;*/
            clear: none;
            float:left;
        }
                
        e-item {
            position: relative;
            width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: left;
        }
        
        e-title {
            display: block;
            margin:15px 10px 15px 10px;
            font-size: 12px;
            color: #666;
        }
        
        e-title h2 {
            font-size: 16px;
            line-height: 10px;
            color: #666;
            font-weight: 300;
        }
        
        e-title p {
            font-size: 12px;
            line-height: 14px;
            color: #666;
        }
        
        .svg-icon {
            background: url(/assets/sprite.css.svg) 78.86134% 0px no-repeat;
            width: 98px;
            height: 98px;
            bottom: -2px;
            position: relative;
            float: right;
        }
        
        p.title {
            font-size: 14px;
            line-height: 16px;
            color: #666;
        }
        
        .t-c {
            text-align: center;
            color: red;
            font-weight: 300;
        }
        
        
        /*
        corp_cate
        */
        .e-header-2 .e-title-2{
            padding: 40px 0 0 0;
            color:#444444;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            font-weight: 300;
        }
        
        .e-header-2 p{
            color:#777777;
            font-size: 14px;
            font-weight: 300;
            text-align: center;
            padding: 20px 0 30px 0;
            
        }
        
    </style>


  <?php foreach ($__cates as $__title=>$__subcates) { ?>
    
    <div class="e-header-2" style="">
      <div class="e-title-2"><?=$__title?></div>
    </div>
    
    <div style="margin-top:0px;">
    </div>
    
    <div style="margin-top:0px;">


        
        <div style="width:100%;padding-bottom:30px;">

            <?php
            if(!empty($__subcates)){
              foreach ($__subcates as $__cate) {
              ?>
              <e-col-2>
                <a onclick="javascript: call_native('open_win',{url:'/tag/course/?tag=<?=$__cate?>', title: '<?=$__cate?>相关课程', }); void(0);" >
                  <div data-ripple-color="#f0f0f0" class="ripple e-card">
                      <e-item>
                          <e-title class="t-c">
                              <h2><?=$__cate?></h2>
                          </e-title>
                      </e-item>
                  </div>
                </a>
              </e-col-2>
            
              <?php
              }
            }
            ?>

            
            <div style="clear:both;"></div>
        </div>
      </div>
  <?php } ?>
    


<script type="text/javascript">

$$.vue({
  el:'#v_main',
})

</script>





<?php
include \view('inc_home_footer');
?>
