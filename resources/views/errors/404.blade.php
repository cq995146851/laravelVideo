<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404页面</title>
  <link href="{{asset('/css/app.css')}}" rel="stylesheet">
</head>
<body >
<div class="middle-box text-center" >
  <h1>404</h1>
  <h3 > 页面未能够找到！! !</h3>
  <div>
    抱歉，页面好像去火星啦！
  </div>
  <div>
    <span id="num"></span>s后自动跳到<a href="javascript:void(0)" onclick="history.go(-1)">上一页</a>
  </div>
</div>
</body>
</html>
<script src="{{asset('/js/app.js')}}"></script>
<script>
  let num = 5
  setInterval(() => {
      if(num > 0){
          $('#num').html(num)
          num--
      }else{
          history.go(-1)
      }
  }, 1000)
</script>