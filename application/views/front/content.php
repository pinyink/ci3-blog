<div class="col-lg-8 entries">
	<?php foreach ($blog as $key => $value): ?>
		<?php
            $data_parser = [
                'base_url' => base_url()
            ];
            $image = $this->parser->parse_string($value->blog_image, $data_parser, true);
        ?>
		<article class="entry">

			<div class="entry-img">
				<img src="<?=!empty($value->blog_image)?$image:base_url().'assets/dist/img/boxed-bg.png';?>" alt="" class="img-fluid">
			</div>

			<h2 class="entry-title">
				<a href="<?=base_url().'article/'.$value->blog_url;?>"><?=$value->blog_title;?></a>
			</h2>

			<div class="entry-meta">
				<ul>
					<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="javascript:;"><?=$value->blog_created_by;?></a></li>
					<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="javascript:;"><time
								datetime="<?=date('Y-m-d', strtotime($value->blog_created_at));?>"></time><?=date('F d, Y', strtotime($value->blog_created_at));?></a>
					</li>
				</ul>
			</div>

			<div class="entry-content">
				<p>
					<?=$value->blog_desc;?>
				</p>
				<div class="read-more">
					<a href="<?=base_url().'article/'.$value->blog_url;?>">Read More</a>
				</div>
			</div>

		</article><!-- End blog entry -->
	<?php endforeach ?>

	<div class="blog-pagination">
		<?=$pagination;?>
	</div>

	<?php if ($count == 0): ?>
		<div class="alert alert-info">Keyword Not Found</div>
	<?php endif ?>

</div><!-- End blog entries list -->
