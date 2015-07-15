<?php if (!defined('THINK_PATH')) exit();?>			<div>
			 <ul class="navbar">
			 <div class="menu">
			<li class="nav-item"><a mars_sead="99999|10|10168|2" href="/shop/index.php/Index/index" class="current">首页</a></li>
			<li class="nav-item"><a mars_sead="99999|10|10153|1" href="/shop/index.php/list/index">品牌</a>
				<div style="" class="ddl">
					<ul class="cols col3">	
						<div class="one-col">
							<li><a href="/shop/index.php/History/index" mars_sead="99999|10|10159|1">唯风尚 - 品牌故事</a></li>
							<li><a href="/shop/index.php/History/index">TOMBOLINI</a></li>
							<li><a href="/shop/index.php/History/index">JKJY by STELLA</a></li>
							<li><a href="/shop/index.php/History/index">PRADA</a></li>
							<li><a href="/shop/index.php/History/index">SHIATZY CHEN</a></li>
							<li><a href="/shop/index.php/History/index">Poltrona Frau</a></li>
							<li><a href="/shop/index.php/History/index">GUCCI</a></li>
							<li><a href="/shop/index.php/History/index">STELLA LUNA</a></li>
							<li><a href="/shop/index.php/History/index">EQ:IQ</a></li>
							<li><a href="/shop/index.php/History/index">ALEXANDRE DE PARIS</a></li>
							<li><a href="/shop/index.php/History/index">CAROLINNA ESPINOSA</a></li>
						</div>
						<div class="one-col">
							<li><a href="/shop/index.php/History/index">PAUL &amp; JOE</a></li>
							<li><a href="/shop/index.php/History/index">PORSCHE DESIGN</a></li>
							<li><a href="/shop/index.php/History/index">Baccarat</a></li>
							<li><a href="/shop/index.php/History/index">PEUTEREY</a></li>
							<li><a href="/shop/index.php/History/index">TRUSSARDI</a></li>
							<li><a href="/shop/index.php/History/index">braccialini</a></li>
							<li><a href="/shop/index.php/History/index">PIERRE BALMAIN</a></li>
							<li><a href="/shop/index.php/History/index">TRU TRUSSARDI HOME</a></li>
							<li><a href="/shop/index.php/History/index">BVLGARI</a></li>
							<li><a href="/shop/index.php/History/index">CAMICISSIMA</a></li>
						</div>
						<div class="one-col">
							<li><a href="/shop/index.php/History/index">MAURIZIO BALDASSARI</a></li>
							<li><a href="/shop/index.php/History/index">Möve</a></li>
							<li><a href="/shop/index.php/History/index">JB MARTIN</a></li>
							<li><a href="/shop/index.php/History/index">TRU TRUSSARDI</a></li>
							<li><a href="/shop/index.php/History/index">REPLAY</a></li>
						</div>
					</ul>
				</div>
			</li>
			
			<?php if(is_array($types)): foreach($types as $key=>$type): if($type['type_pid'] == 0): ?><li class="nav-item">
			
				<if condition="$type['type_pid'] eq 0">
						<a href="/shop/index.php/list/index/id/<?php echo ($type['type_id']); ?>"><?php echo ($type['type_name']); ?></a>
					<div style="" class="ddl">
						<ul class="cols col1">
						<?php if(is_array($types)): foreach($types as $key=>$tye): if($tye['type_pid'] == $type['type_id']): ?><li><a title="" href="/shop/index.php/list/index/id/<?php echo ($tye['type_id']); ?>"><?php echo ($tye['type_name']); ?></a></li><?php endif; endforeach; endif; ?>
						</ul>
					</div>
					
			</li><?php endif; endforeach; endif; ?>
				<li class="nav-item">
					<a href="" mars_sead="99999|10|10159|1">移动版</a>
					<div style="" class="ddl mobile-ddl">
						<div class="mobile-info">
							<p class="title">移动客户端</p>
							<ul>
								<li>• 随时随地浏览品牌最新资讯</li>
								<li>• 品牌官方授权，支持到店体验</li>
								<li>• 在线购买，直接为您送货上门</li>
							</ul>
							<div class="qrcode">
								<img src="/shop/Public/Home/Index/images/qrcode.png" title="扫描下载移动客户端">
								<p>扫描下载移动客户端</p>
							</div>
						</div>
					</div>
				</li>
			    </div>
			</ul>
		</div>