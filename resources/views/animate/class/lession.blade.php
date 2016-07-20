@extends('layouts.master')

@section('title', '選課表生成器')

@section('content')
<!-- Main Content -->
<style type="text/css">

	table {
	table-layout: fixed;
	word-break:break-all;
	}

	#bd {
	}

	.color_f {
		margin :0px;
		padding:0px;
		border:5px solid #FFFFFF;
	}
	.color_green {
		margin :0px;
		padding:0px;
		border:5px solid green;
	}
	.color_red {
		margin :0px;
		padding:0px;
		border:5px solid red;
	}
	.color_blue {
		margin :0px;
		padding:0px;
		border:5px solid blue;
	}

</style>


<header>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li><a href="{{ route('home.index') }}">首頁</a></li>
            <li><a href="#">選課表</a></li>
          </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>七月新番課表</h1>
                    <hr class="small">
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</div>
</header>


<div id="content">
  <div class="container-fluid">
    <div class="row">
		<div class="table-bordered pull-left col-md-2">
			<span>
				使用說明:<br>
				點擊文字連結,即可選課!!<br>
				 &nbsp; &nbsp;紅:(必看) <br>
				 &nbsp; &nbsp;藍:(觀察) <br>
				 &nbsp; &nbsp;綠:(整季看) <br>
			</span>
		</div>

    	<div class="col-lg-8  col-md-10 ">
    		<table width=400 border=1 cellspacing="1" cellpadding="3" style=" width: 900px;">
    		<tbody style="box-sizing: border-box; ">
    		
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center; background-color: rgb(0, 0, 0);">
								<strong><span style="color:#ffd700;">日</span></strong></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center; background-color: rgb(0, 0, 0);">
								<strong><span style="color:#ffd700;">一</span></strong></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center; background-color: rgb(0, 0, 0);">
								<strong><span style="color:#ffd700;">二</span></strong></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center; background-color: rgb(0, 0, 0);">
								<strong><span style="color:#ffd700;">三</span></strong></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center; background-color: rgb(0, 0, 0);">
								<strong><span style="color:#ffd700;">四</span></strong></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center; background-color: rgb(0, 0, 0);">
								<strong><span style="color:#ffd700;">五</span></strong></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center; background-color: rgb(0, 0, 0);">
								<strong><span style="color:#ffd700;">六</span></strong></td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a type="button" href="#亞爾斯蘭戰記 第2期" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">亞爾斯蘭戰記 風塵亂舞</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#齊木楠雄的災難" 	style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">齊木楠雄的災難</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#憂鬱的物怪庵">憂鬱的物怪庵</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#Fate/kaleid liner 魔法少女☆伊莉雅 3rei!!" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">Fate/kaleid liner<br>
								魔法少女☆伊莉雅 3rei!!</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#planetarian 星之夢" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">planetarian 星之夢</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#烙印勇士" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">烙印勇士</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#RS計畫 -Rebirth Storage-" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">RS計畫 -Rebirth Storage-</a></td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#時空幻境 X" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">時空幻境 情熱傳說 the X</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#龍族拼圖">龍族拼圖X</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#腐男子高校生活" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">腐男子高校生活</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#月歌。THE ANIMATION" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">月歌。THE ANIMATION</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#Regalia the Three Sacred Star" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">Regalia the Three Sacred Star</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#小桃小栗 Love Love 物語" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">小桃小栗 Love Love 物語</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#食戟之靈 貳之皿">食戟之靈 貳之皿</a></td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#orange橘色奇蹟" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">orange橘色奇蹟</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#香蕉喵" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">香蕉喵</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#SERVAMP-吸血鬼僕人-" style="font-family: 'Helvetica Neue', Helvetica, Arial, 'Microsoft JhengHei', 微軟正黑體; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;"><span style="box-sizing: border-box; font-family: 微軟正黑體, sans-serif;">SERVAMP<br>
								-吸血鬼僕人-</span></a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#OZMAFIA!!">OZMAFIA!!</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#半田君傳說" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">半田君傳說</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#ReLIFE" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">ReLIFE</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#LoveLive! SunShine!!" style="font-family: 'Helvetica Neue', Helvetica, Arial, 'Microsoft JhengHei', 微軟正黑體; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;"><span style="box-sizing: border-box; font-family: 微軟正黑體, sans-serif;">LoveLive! SunShine!!</span></a></td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#Active Raid -機動強襲室第八班-" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">Active Raid<br>
								-機動強襲室第八班- 第2期</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#NEW GAME!" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">NEW GAME!</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#男子啦啦隊！！" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">男子啦啦隊！！</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#魔法少女？Naria☆Girls" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">魔法少女？Naria☆Girls</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#這個美術社大有問題！" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">這個美術社大有問題！</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#藍海少女！" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Microsoft JhengHei&quot;, 微軟正黑體; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;"><span style="box-sizing: border-box; font-family: 微軟正黑體, sans-serif;">藍海少女！</span></a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#初戀怪獸" style="font-family: 'Helvetica Neue', Helvetica, Arial, 'Microsoft JhengHei', 微軟正黑體; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;"><span style="box-sizing: border-box; font-family: 微軟正黑體, sans-serif;">初戀怪獸</span></a></td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#七大罪 第二期" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">七大罪 聖戰的預兆</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#SHOW BY ROCK!!SHORT!!">SHOW BY ROCK!!SHORT!!</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#魔裝學園HxH" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">魔裝學園HxH</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#美男高校地球防衛部LOVE！LOVE！" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">美男高校地球防衛部LOVE！LOVE！</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#發條精靈戰記 天鏡的極北之星" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">發條精靈戰記<br>
								天鏡的極北之星</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#Rewrite">Rewrite</a></td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#天真與閃電">天真與閃電</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#驚鴻騎士傑克斯" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">驚鴻騎士傑克斯</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#槍彈辯駁3 –The End of 希望峰學園– 絕望篇" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">槍彈辯駁3 –The End of 希望峰學園– 絕望篇</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#91Days" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">91Days</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#B-PROJECT" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">B-PROJECT</a></td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#驅魔少年 新系列" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">驅魔少年 HALLOW</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#野球少年" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">野球少年</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#Thunderbolt Fantasy 東離劍遊紀" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">Thunderbolt Fantasy<br>
								東離劍遊紀</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#DAYS" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">DAYS</a></td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#TABOO-TATTO" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">TABOO TATTOO－禁忌咒紋－</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#時間旅行少女～真理、和花與8名科學家～" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">時間旅行少女～真理、和花與8名科學家～</a></td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#槍彈辯駁3 –The End of 希望峰學園– 未來篇" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">槍彈辯駁3 –The End of 希望峰學園– 未來篇</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#一人之下 the outcast" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">一人之下 the outcast</a></td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#靈能百分百" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">路人超能100</a></td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#QUALIDEA CODE" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">QUALIDEA CODE</a></td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#聖潔天使" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">聖潔天使</a></td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								&nbsp;</td>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#鋼彈創鬥者TRY ISLAND WARS" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">鋼彈創鬥者TRY ISLAND WARS</a></td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								預計2016年內放送</td>
							<td colspan="6" style="box-sizing: border-box; padding: 5px; text-align: center;">
								<p>
									<a href="#鎖鏈戰記 赫克瑟塔斯之光" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">鎖鏈戰記 赫克瑟塔斯之光</a>、<a href="#Occultic;Nine" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">Occultic;Nine</a><span style="color: rgb(51, 51, 51); font-family: 'helvetica neue', helvetica, arial, 'microsoft jhenghei', 微軟正黑體; font-size: 11.8182px;">、</span><a href="#魔法少女育成計劃" style="font-family: 'helvetica neue', helvetica, arial, 'microsoft jhenghei', 微軟正黑體; font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">魔法少女育成計畫</a></p>
							</td>
						</tr>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								延期至10月</td>
							<td colspan="6" style="box-sizing: border-box; padding: 5px; text-align: center;">
								<a href="#DREAM FESTIVAL" style="font-size: 11px; box-sizing: border-box; outline: none; text-decoration: none !important; background-color: transparent;">DREAM FESTIVAL</a></td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td style="box-sizing: border-box; padding: 5px; text-align: center;">
								課表生成時間:
							</td>
							<td colspan="6" style="box-sizing:border-box; padding: 5px; text-align: center;">
								<p style="font-size:22px;">{{date('Y-m-d')}}</p>
							</td>
						</tr>
						
					</tfoot>
    		</table>	




				<hr/>
				<input type="button" value="轉為圖檔" />
				<a></a>
				<fieldset>
					<legend>圖檔</legend>
						<div>
						</div>
				</fieldset>
    	</div>
    </div>
  </div>
</div>

<script type="text/javascript">
	//background-color: rgb(0, 0, 0);
	//alert('location.hash: '+location.hash);
	//alert($('[href="'+location.hash+'"]').text());
	var init = 0;
	$('tbody td').each(function(){
		init = init +1;
		if (init>7) { 
			var html = $(this).html();
			$(this).html("");
			$(this).prepend("<div id='bd' class='color_f'>"+html);
		}
	});


	$('a').click("click",function(){

		var style = $(this).parent('div').attr('class');
		//alert(style);
		if (style == 'color_green') {
			$(this).parent('div').removeClass('color_green');
			$(this).parent('div').addClass('color_blue');
		}
	 	
	 	if (style == 'color_blue') {
	 		$(this).parent('div').removeClass('color_blue');
			$(this).parent('div').addClass('color_red');
		}

		if (style == 'color_red') {
			$(this).parent('div').removeClass('color_red');
			$(this).parent('div').addClass('color_f');
		}

		if (style == 'color_f') {
			$(this).parent('div').removeClass('color_f');
			$(this).parent('div').addClass('color_green');
		}


	});

</script>

<script src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.0.0.js "></script>
<script src="http://html2canvas.hertzen.com/build/html2canvas.js"></script>
<script>
	    $(":button").click(function() {
	      html2canvas($("table")[0], {
	        onrendered: function(canvas) {
	          var $div = $("fieldset div");
	          $div.empty();
	          $("<img />", { src: canvas.toDataURL("image/png") }).appendTo($div);
	        }
	      });
	    });
</script>

@endsection