<style>
    #menu{
        width: 35px;
        height: 30px;
        margin: 30px 0 20px 20px;
        cursor: pointer;
    }
    .bar{
        height: 5px;
        width: 100%;
        background-color: #A31621;
        display: block;
        border-radius: 5px;
        transition: 0.3s ease;
    }
    #bar1{
        transform: translateY(-4px);
    }
    #bar3{
        transform: translateY(4px);
    }
    .nav li a{
        color: #fff;
        text-decoration: none;
        font-size: 20px;
    }
    .nav li a:hover{
        font-weight: bold;
    }
    .nav li{
        list-style: none;
        padding: 10px 0;
    }
    .nav{
        padding: 0;
        margin: 0 20px;
        transition: 0.3s ease;
        display: none;
    }
    .menu-bg, #menu-bar{
        top: 0;
        left: 0;
        position: absolute;
    }
    .menu-bg{
        width: 0;
        height: 0;
        margin: 30px 0 20px 20px;
        background: radial-gradient(circle,#A31621,#A31621);
        border-radius: 50%;
        transition: 0.3s ease;
        z-index: 999998;	
        top: 0;
        position: fixed;
    }
    #menu-bar{
        z-index: 999999;	
        top: 0;
        position: fixed;
    }
    .change-bg{
        width: 520px;
        height: 580px;
        transform: translate(-60%,-30%);
    }
    .change .bar{
        background-color: white;
    }
    .change #bar1{
        transform: translateY(4px) rotateZ(-45deg);
    }
    .change #bar3{
        transform: translateY(-6px) rotate(45deg);
    }
    .change #bar2{
        opacity: 0;
    }
    .change{
        display: block;
    }
</style>
<div id="menu-bar" class="bg-primairy position-fixed">
    <div id="menu" onclick="onClickMenu()">
        <div id="bar1" class="bar"></div>
        <div id="bar2" class="bar"></div>
        <div id="bar3" class="bar"></div>
    </div>
    <ul class="nav" id="nav">
      <li><a href="{{route('welcome.index')}}">Home</a></li>
      <li><a href="{{route('aboutus.index')}}">Over ons</a></li>
      <li><a href="{{route('calendaritems.index')}}">Activiteiten</a></li>
      <li><a href="{{route('newsarticles.index')}}">Nieuws</a></li>
      <li><a href="{{route('newsletters.index')}}">Nieuwsbrieven</a></li>
      <li><a href="{{route('photogallery.index')}}">Fotogalerij</a></li>
      <li><a href="{{route('contact.index')}}">Contact</a></li>
    </ul>
</div>
    <div class="menu-bg position-fixed" id="menu-bg"></div>
<script>
    function onClickMenu(){
        document.getElementById("menu").classList.toggle("change");
        document.getElementById("nav").classList.toggle("change");
        
        document.getElementById("menu-bg").classList.toggle("change-bg");
    }
</script>