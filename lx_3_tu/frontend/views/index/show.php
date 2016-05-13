<center>
    <h1>图片轮播</h1>
    <?php foreach($list as $key=>$val){?>
        <div id="show_<?php echo $key?>">
            <img src="../../backend/web/<?php echo $val["my_files"]?>" width="80px" height="100px"/>
        </div>
        <a href="JavaScript:void(0)" onclick="huan(<?php echo $key;?>)" id="red_<?php echo $key;?>" style="color: red"><?php echo $key+1;?></a>
    <?php }?>

</center>
<!-- <script src="jquery.js"></script> -->
<script>
    var index = 0;  //图片序号
    var adTimer;
    var num=1;
    var number=0;
    window.onload=function(){
        setInterval("huan()",2000);
        for(num;num<5;num++) {
            $('#show_' + num).attr('style', 'display:none');
            $('#red_' + num).attr('style', 'color:black');
            $('#show_' + num).hover(
                function () {
                    $(this).addClass("hover");
                },
                function () {
                    $(this).removeClass("hover");
                }
            );
        }
        //$('#red_' + 1).attr('style', 'color:red');
    }

    function huan(){
        //alert(num)
        $('#show_' + number).attr('style', 'display:block');
        $('#red_' +number ).attr('style', 'color:red');
        var sumber=0;
        for(sumber;sumber<=5;sumber++) {
            //alert(sumber);
            //$('#red_' + 1).attr('style', 'color:black');
            if(sumber!=number){
                $('#show_' + sumber).attr('style', 'display:none');
                $('#red_' + sumber).attr('style', 'color:black');
            }
        }
        number++
        // $('#red_' +number ).attr('style', 'color:red');
        if(number==<?php echo $num;?>){
            number=0;
        }
    }
</script>

