


//功能模块一：用户登录
//1.1 当用户点击登录按钮，获取参数
//1.2 验证用户输入值
//1.3 发送ajax请求，完成登录业务
//1.4 处理成功或失败的结果

  //获取用户名和密码验证出错的次数
  var vcode_count_fail = sessionStorage.getItem("vcode_count_fail");
  if(vcode_count_fail == null){
    vcode_count_fail = 1;
  }

  //如果用户输入用户名或密码的错误超过4次，显示验证码
  function validatorVcode(){
  sessionStorage.setItem("vcode_count_fail",vcode_count_fail);
  if(vcode_count_fail>4){
      $("#vcode").removeClass("hidden");
  }

}

 //防止用户输入错误超过4次刷新页面，“刷新页面立即验证”
 validatorVcode();

$("[name='usubmit']").click(function(){
  validatorVcode();
  //获取用户输入数据
  var u = $("[name='uname']").val(); //用户名
  var p = $("[name='upwd']").val();  //密码
  var v = $("[name='vcode']").val(); //验证码

 //验证用户输入的数据
  var ureg = /^[a-z0-9]{3,12}$/i;
  var preg = /^[a-z0-9]{3,12}$/i;
  var vreg = /^[a-z0-9]{4}$/i;

  if(!ureg.test(u)){
     alert("用户名格式不正确: 只能是3〜6 位字母数字");
     return;
  }
  if(!preg.test(p)){
    alert("密码格式不正确: 只能是3〜6 位字母数字");
    return;
 }
 //当登录次数超过4次而且验证码输的不正确才验证
 if(vcode_count_fail>4 && !vreg.test(v)){
  alert("验证码格式不正确: 只能是4 位字母数字");
  return;
}

  //发送ajax请求完成业务处理
  $.ajax({
    url:"data/01_login.php",
    data:{uname:u,upwd:p,vcode:vcode_count_fail,code:v},
    success:function(data){
      //data.code:-3 验证码出错
      //data.code:-2 用户名和密码有误
      if(data.code==-3){
         vcode_count_fail++;
         validatorVcode();
         alert("验证码有误请检查");
      }else if(data.code == -2) {
        vcode_count_fail++;
        validatorVcode();
        alert(data.msg);
      }else if(data.code > 0){
         sessionStorage.setItem("uid",data.uid);
         sessionStorage.setItem("uname",u);
         alert("登录成功，自动跳转到首页");
         location.href = "main.html";
      }else{
         alert("网络故障请检查");
         console.log(data);
      }
    }
    ,error:function(err){
      alert("网络故障请检查");
      console.log(err);
    }
  });
});

//看不清切换验证码
$(".change_vcode").click(function(e){
  e.preventDefault();
    $(".change_img").attr("src","data/03_code_gg.php");
});