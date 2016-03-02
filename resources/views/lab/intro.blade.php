
@extends('navbar')

@section('title')
实验室概况
@endsection

@section('extra-link')
<link rel="stylesheet" href="{{ asset('assets/website/subpage.css') }}">
@endsection

@section('content')

		<div class="container menu-container">
			<div class="col-md-3">
				<div class="downdown center-block">
					<div class="stayaway">
						<div class="button-list">
							<a href="{{URL('/lab')}}">
								<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
								&nbsp;实验室简介
							</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/lab/facility')}}">基础设施</a>
						</div>
						<div class="button-list">
							<a href="{{URL('/lab/talent')}}">人才培养</a>
						</div>
						<script>
							$(function(){
								$('.button-list').mouseenter(function(){
									$(this).stop(true);
									$(this).animate({left:"10px"}, "fast");
								});
								$('.button-list').mouseleave(function(){
									$(this).stop(true);
									$(this).animate({left:"0px"}, "fast");
								});
							});
						</script>
					</div>
				</div>
			</div>


<div class="col-md-9">
				<div class="allcontent">
					<p class="ltittle"> <b>实验室简介</b>
					</p>
					<div class="content">
						<p>
							软件工程国家重点实验室（以下简称实验室）于1985年经国家批准建设，1989年通过验收并正式对外开放。现任学术委员会主任梅宏院士，实验室主任徐宝文教授。实验室现有固定科研人员50名，其中教授28名，副教授13名。
						</p>
						<p>
							实验室按照以软件工程为主体，以数据管理和信息安全为两翼（即“一体两翼”）的发展思路，在软件服务工程、复杂软件的构造方法和验证技术、软件分析测试与质量保障、可信软件、软件工程数据管理与数据挖掘等方面开展了理论、方法、技术、标准、基础设施以及典型应用等研究。五年来，共承担和完成科研项目213项，其中主持973计划项目1项、863计划项目12项、国家自然科学基金重点项目5项。在包括国际顶级期刊IEEE Trans. on Computers 、IEEE Trans. on Knowledge and Data Engineering 、IEEE Journal of  Selected Areas in Communications、IEEE Trans. on Communications 和国际顶级会议ICSE、FSE、OOPSLA、AAAI、VLDB、SIGIR等国内外刊物和会议上发表论文1123篇，出版论著14本。获国家科技进步二等奖1项，省部级一等奖6项。发明专利授权45项、实用新型专利3项、软件著作权47项。主持制订ISO国际标准5项、国家标准4项。
						</p>
						<p>
							实验室注重学术合作与交流，与国内外知名大学和科研机构建立了广泛联系，五年来，举办国际、国内学术会议12次，邀请国内外知名学者、专家来实验室做学术报告126场，选派学术骨干进行国内外学术交流120人次，在国内外重要学术会议上做特邀报告14场。
						</p>
						<p>
							实验室科研条件良好。拥有五千多平米的办公大楼和价值七千多万元的仪器设备，其中30万元以上的仪器设备16台，包括高性能计算系统、网格计算系统、软件测试系统、三维仿真系统、云计算平台、分析与设计建模软件平台等。
						</p>
						<p>
							实验室贯彻“开放、流动、联合、竞争”的方针，面向国家重大需求，开展软件工程基础与应用基础研究，解决软件工程关键技术问题，推进科研成果转化，努力将实验室建设成为软件工程领域中具备学术开拓能力、方法创新能力和社会服务能力的权威机构，成为国内外软件工程领域重要的研究基地、人才培养基地与学术交流中心。
						</p>
					</div>
				</div>
				<div class="allcontent">
					<p class="ltittle"> <b>学术委员会</b>
					</p>
					<div class="content">
						<table class="table table-bordered table-striped">
							<tr>
								<th>编号</th>
								<th>姓名</th>
								<th>学委会职务</th>
								<th>职称</th>
								<th>专业</th>
								<th>所在单位</th>
							</tr>
							<tr>
								<td>1</td>
								<td>梅宏</td>
								<td>主任</td>
								<td>院士</td>
								<td>计算机软件</td>
								<td>
									上海交通大学
									<br>北京大学</td>
							</tr>
							<tr>
								<td>2</td>
								<td>吕建</td>
								<td>副主任</td>
								<td>院士</td>
								<td>计算机软件</td>
								<td>南京大学</td>
							</tr>
							<tr>
								<td>3</td>
								<td>怀进鹏</td>
								<td>副主任</td>
								<td>院士</td>
								<td>计算机软件</td>
								<td>北京航空航天大学</td>
							</tr>
							<tr>
								<td>4</td>
								<td>刘经南</td>
								<td>副主任</td>
								<td>院士</td>
								<td>卫星定位</td>
								<td>武汉大学</td>
							</tr>
							<tr>
								<td>5</td>
								<td>刘兴铭</td>
								<td>委员</td>
								<td>院士</td>
								<td>系统结构</td>
								<td>
									同济大学
									<br>国防科技大学</td>
							</tr>
							<tr>
								<td>6</td>
								<td>陈国良</td>
								<td>委员</td>
								<td>院士</td>
								<td>智能计算</td>
								<td>
									深圳大学
									<br>中国科技大学</td>
							</tr>
							<tr>
								<td>7</td>
								<td>林惠民</td>
								<td>委员</td>
								<td>院士</td>
								<td>计算机软件</td>
								<td>中科院软件所</td>
							</tr>
							<tr>
								<td>8</td>
								<td>李建中</td>
								<td>委员</td>
								<td>教授</td>
								<td>数据库</td>
								<td>哈尔滨工业大学</td>
							</tr>
							<tr>
								<td>9</td>
								<td>王怀民</td>
								<td>委员</td>
								<td>教授</td>
								<td>计算机软件</td>
								<td>国防科技大学</td>
							</tr>
							<tr>
								<td>10</td>
								<td>金芝</td>
								<td>委员</td>
								<td>教授</td>
								<td>计算机软件</td>
								<td>北京大学</td>
							</tr>
							<tr>
								<td>11</td>
								<td>金海</td>
								<td>委员</td>
								<td>教授</td>
								<td>系统结构</td>
								<td>华中科技大学</td>
							</tr>
							<tr>
								<td>12</td>
								<td>胡瑞敏</td>
								<td>委员</td>
								<td>教授</td>
								<td>多媒体信息处理</td>
								<td>武汉大学</td>
							</tr>
							<tr>
								<td>13</td>
								<td>徐宝文</td>
								<td>委员</td>
								<td>教授</td>
								<td>计算机软件</td>
								<td>
									武汉大学
									<br>南京大学</td>
							</tr>
						</table>

					</div>
				</div>
				<div class="allcontent">
					<p class="ltittle">
						<b>领导班子</b>
					</p>
					<div class="content">
						<p>
						<b>主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;任</b>
						&nbsp;&nbsp;&nbsp;&nbsp;徐宝文
					</p>
					<p>
						<b>常务副主任</b>
						&nbsp;&nbsp;&nbsp;&nbsp;应&nbsp;&nbsp;&nbsp;&nbsp;时
					</p>
					<p>
						<b>副&nbsp;&nbsp;&nbsp;&nbsp;主&nbsp;&nbsp;&nbsp;任</b>
						&nbsp;&nbsp;&nbsp;&nbsp;吴志健、彭&nbsp;&nbsp;&nbsp;&nbsp;蓉
					</p>
					</div>

				</div>
			</div>
		</div>

@endsection