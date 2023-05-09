<?php
/**
 * Renders the Selected Sector & Subsector Section
 *
 * @package TenUpTheme
 */
$id = 'selected-sector-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

$selected_sectors 	= get_field('selected__sub_sector');
$sub_title			= get_field('sub_title');
$title				= get_field('title');
$cta_text			= get_field('cta_text');

if ( ! get_field( 'block_preview' ) ) {
	?>
	<section 	class="w-full h-full px-[14px] lg:px-[82px] flex flex-col justify-center items-center py-[82px]"
				id="<?php echo esc_attr( $id ); ?>"
				>

				<?php if( isset( $sub_title ) || isset( $title ) ): ?>
				<div class="flex flex-col items-center justify-center w-full mb-[43px]">
						<span class="text-lg font-bold uppercase mb-[10px] leading-6"><?php echo esc_attr( $sub_title ); ?></span>
						<h2 class="mt-0 text-center text-[40px] font-bold leading-[60px] max-w-[1060px]"><?php echo esc_attr( $title ); ?></h2>
				</div>
				<?php endif; ?>

				<?php if ($selected_sectors):?>
					<ul class="grid w-full sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 pt-[88px] pb-[62px] m-0 pl-0">
					<?php foreach ( $selected_sectors as $selected):  ?>
						<?php
							$featured_icon_sub_sector = get_field('sector_icon', $selected);
						?>
						<li class="p-0 m-0">
							<a
								class="flex flex-col items-center justify-center no-underline group hover:opacity-100"
								href="<?php echo esc_url( get_term_link($selected) ); ?>"
								target="_blank"
								aria-label="Click to go <?php echo esc_html( $selected->name ) ?> Sector"
							>
								<?php if($featured_icon_sub_sector): ?>
									<?php
									echo wp_get_attachment_image(
										$featured_icon_sub_sector,
										'full',
										false,
										array( 'class' => 'img-responsive group-hover:opacity-50' )
										);
									?>
								<?php endif; ?>
								<h4 class="pt-[24px] m-0 font-bold text-[18px] text-center max-[196px] group-hover:opacity-100 group-hover:underline">
									<?php echo esc_html( $selected->name ); ?>
								</h4>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<?php if( $cta_text ): ?>
				<a
					href="/sectors"
					aria-label="Link to Team Page"
					class="text-black no-underline border-2 border-black btn"
				>
					<?php echo esc_attr( $cta_text ); ?>
				</a>
				<?php endif; ?>

	</section>

	<?php } else { ?>
		<div data="gutenberg-preview-img">
			<img style="max-width:100%; height:auto;" src="<?php the_field( 'block_preview' ); ?>">
		</div>
	<?php } ?>
