<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom_thumbnails
 *
 * @copyright	Copyright © 2023 - All rights reserved.
 * @license		GNU General Public License v2.0
 * @author 		Sergio Iglesias (@sergiois)
 */

use Joomla\CMS\Router\Route;

defined('_JEXEC') or die;

$spanmd = 4;
switch($params->get('count'))
{
    case 1: $spanmd = 12; break;
    case 2: $spanmd = 6; break;
    case 3: $spanmd = 4; break;
    case 4: $spanmd = 3; break;
    default: $spanmd = 4;
}
?>
<div class="row <?php echo $moduleclass_sfx; ?>">
<?php for ($i=1; $i<=$params->get('count'); $i++) : ?>
    <div class="col-xs-12 col-sm-6 col-md-<?php echo $spanmd; ?> col-lg-<?php echo $spanmd; ?>" itemscope itemtype="https://schema.org/Article">
        <div class="card">
            <?php
            $url = '';
            if($params->get('url'.$i) != 'no'):
                $url = $params->get('urlexternal'.$i);
                if($params->get('url'.$i) == 'internal'):
                    $url = Route::_('index.php?Itemid='.$params->get('urlinternal'.$i));
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
                        <img class="card-img-top" data-src="<?php echo $image; ?>" src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
                    </a>
                <?php else: ?>
                    <img class="card-img-top" data-src="<?php echo $image; ?>" src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
                <?php endif; ?>
            <?php endif; ?>
            
            <?php if($params->get('title'.$i) || $params->get('content'.$i) || $params->get('show_readmore'.$i)): ?>
            <div class="card-body">
                <?php if($params->get('title'.$i)): ?>
                    <h3 class="card-title" itemprop="name">
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
                    <p class="card-text"><?php echo $params->get('content'.$i); ?></p>
                <?php endif; ?>
                
                <?php if($params->get('show_readmore'.$i)): ?>
                <p class="mb-0">
                    <a href="<?php echo $url; ?>" class="btn btn-primary"><?php echo $params->get('readmore_text'.$i) ? $params->get('readmore_text'.$i) : JText::_('MOD_CUSTOM_THUMBNAILS_FIELD_READMORE_TEXT'); ?></a>
                </p>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
	</div>
<?php endfor; ?>
</div>