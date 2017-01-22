<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom_thumbnails
 *
 * @copyright	Copyright © 2016 - All rights reserved.
 * @license		GNU General Public License v2.0
 * @author 		Sergio Iglesias (@sergiois)
 */
 
defined('_JEXEC') or die;

$spanmd = 3;
switch($params->get('count'))
{
    case 1: $spanmd = 1; break;
    case 2: $spanmd = 2; break;
    case 3: $spanmd = 3; break;
    case 4: $spanmd = 4; break;
    default: $spanmd = 4;
}
?>
<div class="uk-grid <?php echo $moduleclass_sfx; ?>">
<?php for ($i=1; $i<=$params->get('count'); $i++) : ?>
    <div class="uk-width-small-1-1 uk-width-medium-1-<?php echo $spanmd; ?> uk-width-large-1-<?php echo $spanmd; ?>" itemscope itemtype="https://schema.org/Article">
        <div class="uk-thumbnail">
            <?php
            $url = '';
            if($params->get('url'.$i) != 'no'):
                $url = $params->get('urlexternal'.$i);
                if($params->get('url'.$i) == 'internal'):
                    $url = JRoute::_('index.php?Itemid='.$params->get('urlinternal'.$i));
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
            
            <?php if($params->get('title'.$i) || $params->get('content'.$i) || $params->get('show_readmore'.$i)): ?>
            <div class="uk-thumbnail-caption">
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
                <p class="uk-text-right">
                    <a href="<?php echo $url; ?>" class="uk-button uk-button-primary"><?php echo $params->get('readmore_text'.$i) ? $params->get('readmore_text'.$i) : JText::_('MOD_CUSTOM_THUMBNAILS_FIELD_READMORE_TEXT'); ?></a>
                </p>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
	</div>
<?php endfor; ?>
</div>