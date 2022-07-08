<nav class="site-navigation position-relative text-right" role="navigation">
    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
        <?php
            if (Voyager::translatable($items)) {
                $items = $items->load('translations');
            }
        ?>

        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $originalItem = $item;
                if (Voyager::translatable($item)) {
                    $item = $item->translate($options->locale);
                }

                $listItemClass = null;
                $linkAttributes =  null;
                $styles = null;
                $icon = null;
                $caret = null;

                // Background Color or Color
                if (isset($options->color) && $options->color == true) {
                    $styles = 'color:'.$item->color;
                }
                if (isset($options->background) && $options->background == true) {
                    $styles = 'background-color:'.$item->color;
                }

                // With Children Attributes
                if(!$originalItem->children->isEmpty()) {
                    $linkAttributes =  'class="dropdown-toggle" data-toggle="dropdown"';
                    $caret = '<span class="caret"></span>';

                    if(url($item->link()) == url()->current()){
                        $listItemClass = 'dropdown active';
                    }else{
                        $listItemClass = 'dropdown';
                    }
                }

                // Set Icon
                if(isset($options->icon) && $options->icon == true){
                    $icon = '<i class="' . $item->icon_class . '"></i>';
                }

            ?>


            <?php if(!$originalItem->children->isEmpty()): ?> 
                <li class="has-children">
                <?php if(!$originalItem->children->isEmpty()): ?>
                     <a href="#" class="nav-link text-left"><?php echo e($item->title); ?></a>
                     <ul class="dropdown">
                        <?php $__currentLoopData = $originalItem->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(url($child->link())); ?>">
                                    <?php echo e($child->title); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>   
                  <?php endif; ?>        
                </li>
            <?php else: ?>                
            <li>
                <a class="nav-link text-left" href="<?php echo e(url($item->link())); ?>" target="<?php echo e($item->target); ?>" style="<?php echo e($styles); ?>" <?php echo $linkAttributes ?? ''; ?>>
                    <span><?php echo e($item->title); ?></span>
                </a>
            </li>
            <?php endif; ?>    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
    </ul>    
</nav>    <?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/my-menu.blade.php ENDPATH**/ ?>