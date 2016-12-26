<?php
defined('_JEXEC') or die;
$span = 4;
switch($params->get('count'))
{
    case 1: $span = 12; break;
    case 2: $span = 6; break;
    case 3: $span = 4; break;
    case 4: $span = 3; break;
    default: $span = 4;
}
?>
<ul class="thumbnails <?php echo $moduleclass_sfx; ?>">
<?php for ($i=1; $i<=$params->get('count'); $i++) : ?>
	<li class="span<?php echo $span; ?>" itemscope itemtype="https://schema.org/Article">
        <div class="thumbnail">
            <?php
            $url = '';
            if($params->get('url'.$i) != 'no'):
                $url = $params->get('urlexternal'.$i);
                if($params->get('url'.$i) == 'internal'):
                    $url = $params->get('urlinternal'.$i);
                endif;
            endif;
            ?>

            <?php if($params->get('image'.$i)): ?>
                <?php
                $image = $params->get('image'.$i);
                $alt = $params->get('title'.$i);
                ?>
                <?php if($params->get('link_image'.$i)): ?>
                    <a href="<?php echo $url; ?>" itemprop="url">
                        <img data-src="<?php echo $image; ?>" src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
                    </a>
                <?php else: ?>
                    <img data-src="<?php echo $image; ?>" src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
                <?php endif; ?>
            <?php endif; ?>
            
            <?php if($params->get('title'.$i)): ?>
                <h3 itemprop="name">
                    <?php if($params->get('link_title'.$i)): ?>
                        <a href="<?php echo $url; ?>" itemprop="url">
                    <?php endif; ?>
                    <?php echo $params->get('title'.$i); ?>
                    <?php if($params->get('link_title'.$i)): ?>
                        </a>
                    <?php endif; ?>
                </h3>
            <?php endif; ?>

            <?php if($params->get('content'.$i)): ?>
                <p><?php echo $params->get('content'.$i); ?></p>
            <?php endif; ?>
            
            <?php if($params->get('show_readmore'.$i)): ?>
            <p class="text-right">
                <a href="<?php echo $url; ?>" class="btn btn-primary"><?php echo $params->get('readmore_text'.$i) ? $params->get('readmore_text'.$i) : JText::_('MOD_CUSTOM_THUMBNAILS_FIELD_READMORE_TEXT'); ?></a>
            </p>
            <?php endif; ?>
        </div>
	</li>
<?php endfor; ?>
</ul>