<div class="col-lg-4">

	<div class="sidebar">

		<h3 class="sidebar-title">Search</h3>
		<div class="sidebar-item search-form">
			<form action="<?=base_url();?>">
				<input type="text" name="search">
				<button type="submit"><i class="bi bi-search"></i></button>
			</form>
		</div><!-- End sidebar search formn-->

		<h3 class="sidebar-title">Recent Posts</h3>
		<div class="sidebar-item recent-posts">
			<?php foreach ($data as $key => $value): ?>
				<?php
                    $data_parser = [
                        'base_url' => base_url()
                    ];
                    $image = $this->parser->parse_string($value->blog_image, $data_parser, true);
                ?>
				<div class="post-item clearfix">
					<img src="<?=!empty($value->blog_image)?$image:base_url().'assets/dist/img/boxed-bg.png';?>" alt="">
					<h4><a href="<?=base_url().'article/'.$value->blog_url;?>"><?=$value->blog_title;?></a></h4>
					<time datetime="<?=date('Y-m-d', strtotime($value->blog_created_at));?>"><?=date('F d, Y', strtotime($value->blog_created_at));?></time>
				</div>
			<?php endforeach ?>
		</div><!-- End sidebar recent posts-->
	</div><!-- End sidebar -->

</div><!-- End blog sidebar -->
