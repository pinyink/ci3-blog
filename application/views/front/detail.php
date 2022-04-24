<div class="col-lg-8 entries">
	<?php
        $data_parser = [
            'base_url' => base_url()
        ];
        $text = $data->blog_text;
        $text = $this->parser->parse_string($text, $data_parser, true);
        $image = $this->parser->parse_string($data->blog_image, $data_parser, true);
    ?>

	<article class="entry entry-single">

		<div class="entry-img">
			<img src="<?=!empty($data->blog_image)?$image:base_url().'assets/dist/img/boxed-bg.png';?>" alt="" class="img-fluid">
		</div>

		<h2 class="entry-title">
			<a href="<?=base_url().'article/'.$data->blog_url;?>"><?=$data->blog_title;?></a>
		</h2>

		<div class="entry-meta">
			<ul>
				<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="javascript:;"><?=$data->blog_created_by;?></a></li>
				<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="javascript:;"><time
							datetime="<?=date('Y-m-d', strtotime($data->blog_created_at));?>"><?=date('F d, Y', strtotime($data->blog_created_at));?>0</time></a></li>
			</ul>
		</div>

		<div class="entry-content">
			<?=$text;?>
		</div>

	</article><!-- End blog entry -->

	<div class="blog-author d-flex align-items-center">
		<img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
		<div>
			<h4>Jane Smith</h4>
			<div class="social-links">
				<a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
				<a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
				<a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
			</div>
			<p>
				Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat
				voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
			</p>
		</div>
	</div><!-- End blog author bio -->

</div><!-- End blog entries list -->
