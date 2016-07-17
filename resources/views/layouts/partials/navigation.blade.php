<!-- Navigation -->
<div id="profile">
  <div>
   <i class="glyphicon glyphicon-home"></i>
  </div>
  <div>
    <a href="{{ route('home.index') }}"><h4>Cosmos</h4></a>
  </div>
</div>


<ul id="menu">
  <li id="dashboard"></li>
  <li id="admin"><a class="parent"> <i class="glyphicon glyphicon-wrench"></i><span>後台</span></a>
      <ul>
          <li><a href="{{ route('admin.index') }}">登入</a></li>
      </ul>
  </li>
  <li id="about"><a href="{{ route('about.index') }}"><i class="glyphicon glyphicon-asterisk"></i> <span>關於</span></a>
  <li id="article"><a href="{{ route('article.list') }}"><i class="glyphicon glyphicon-list-alt"></i> <span>文章列表</span></a>
  <li id="contact"><a href="{{ route('home.index') }}"><i class="glyphicon glyphicon-envelope"></i> <span>聯絡方式</span></a>
  <li id="other"><a href="{{ route('animateNewLession.index') }}"><i class="glyphicon glyphicon-star-empty"></i> <span>其他</span></a>

</ul>
